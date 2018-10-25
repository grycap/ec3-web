<?php
//Tuto basico de PHP: http://www.w3schools.com/php/php_variables.asp

//la clase Process habra que sacarla a un fichero ya que es comun

include_once('process.php');

// Generates a random string for the name of the cluster
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function getSSLPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_SSLVERSION,3); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    // For unit tests
    if ($GLOBALS["EC3UnitTest"]) return "line1\nline2\nline3";    

    return $result;
}


if($_POST){
   
    if (isset($_POST['clustername'])) {
        $clustername = $_POST['clustername'];
    } else {
        exit("ERROR: No clustername parameter specified.");
    }
    
    if (isset($_POST['provider'])) {
        $provider = $_POST['provider'];
        $provider = strtolower($provider);
    } else {
        exit("ERROR: No provider parameter specified.");
    }
    
    //$auth_file = "/tmp/auth_" .substr($clustername, 8);
    $auth_file = "/tmp/auth_" .$clustername;

    if(!isset($_SESSION)) session_start();

    if (!isset($_SESSION["egi_user_sub"])) {
        //echo "Error no EGI AAI user ID obtained.";
        header('Location:session_expired.html');
        die("");
    } else {
        $user_sub = $_SESSION["egi_user_sub"];
    }

    if ($provider == 'occi'){
        $proxy = getSSLPage("https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/08b435574d4f19c734f19514828ad0ab?voms=vo.access.egi.eu:/vo.access.egi.eu&proxy-renewal=true&disable-voms-proxy=false&rfc-proxy=true&cn-label=eToken:" . $user_sub);
        $proxy = str_replace("\n", "\\n", $proxy);
        if($proxy!=""){
            //ahora recuperamos la linea de credenciales del IM
            $im_line="";

            if (file_exists($auth_file)){
                //leemos el antiguo fichero de credenciales
                $file = fopen($auth_file, "r") or exit("Unable to find the old auth file:" . $auth_file . ". Is the cluster name correct?");
                while(!feof($file)){
                    $line = fgets($file);
                    if(strstr($line, "proxy")){
                        $proxy_line = $line;
                        $endpoint = substr($line, strpos($line, "host = ")+7);
                    }
                    if(strstr($line, "InfrastructureManager")){
                        $im_line=$line;
                    }
                }
                fclose($file);
            } else {
                //si no existe el $auth_file, la info del IM se puede sacar de "/var/www/html/.ec3/clusters/" . $clustername
                //en el system front/auth buscar la linea de "type": "InfrastructureManager" y esa es la que tenemos que guardar en $im_line
                 $im_username = "";
                 $im_pass = "";
                 $endpoint = "";
                 $file = fopen("/var/www/.ec3/clusters/" . $clustername, "r") or exit("Unable to find the cluster data for cluster:" . $clustername . ". Is the cluster name correct?");
                 $logs = fopen("/tmp/amcaar_logs.txt", "w");
                 while(!feof($file)){
                    $line = fgets($file);
                    if(strstr($line, "auth")){
                        //coger los datos necesarios del IM, la linea de auth tiene formato JSON
                        $auth_data_json = substr($line, strpos($line, "auth = ")+8, strpos($line, "' and") - (strpos($line, "auth = ")+8));
                        $json_decoded = json_decode($auth_data_json);
                        fwrite($logs, $auth_data_json);
                        //acceder a username y password de im y guardarlo en dos variables
                        for ($i = 0; $i < count($json_decoded); $i++) {
                            if ($json_decoded[$i]->{'type'} == "InfrastructureManager") {
                                $im_username = $json_decoded[$i]->{'username'};
                                $im_pass = $json_decoded[$i]->{'password'};
                            }
                            if ($json_decoded[$i]->{'type'} == "OCCI") {
                                $endpoint = $json_decoded[$i]->{'host'};
                            }
                        }
                        $im_line="type = InfrastructureManager; username = " . $im_username . "; password = " . $im_pass;
                    }
             }
                 fclose($file);
                 fclose($logs);
             }

            //Y escribimos el nuevo fichero auth
            $gestor = fopen($auth_file, "w");
            fwrite($gestor, "id = occi; type = OCCI; proxy = " . $proxy . "; host = " . $endpoint . PHP_EOL);
            fwrite($gestor, $im_line. PHP_EOL);
            fclose($gestor);
        } else {
            exit("Error contacting eToken server.");
        }
    }

    // llamamos a EC3 para eliminar el cluster
    //$ec3_log_file = "/tmp/ec3_del_".random_string(5);
    $ec3_log_file = "/tmp/ec3_del_". $clustername;
    if($auth_file != ""){
        $process_2 = new Process("./command/ec3 destroy --yes --force -a " . $auth_file. " " . $clustername, $ec3_log_file);
    } else {
        $process_2 = new Process("./command/ec3 destroy --yes --force " . $clustername, $ec3_log_file);
    }
    $pid = $process_2->start();
    // Comprobamos si se ha eliminado correctamente
    $status = False;
    while($process_2->status()) {
        sleep(1);
    }

    $log_content = file_get_contents($ec3_log_file);
    //if(strpos($log_content, "Success") === True){
    //if(strpos($log_content, "Error") === False && strpos($log_content, "not found") === False){
    if(strpos($log_content, "Error") === False){
        $status = True;
    }
    
    if($status){
	// Esperamos un poco para asegurarnos de borrar el fichero
        sleep(10);
        if (file_exists('/var/www/.ec3/clusters/'. $clustername)) {
            unlink('/var/www/.ec3/clusters/'. $clustername);
        }
        echo "{}";
    } else {
        echo "Problems deleting the cluster. Try again or contact us if the error persists.";
    }
    // TODO: borrar el fichero auth* con las credenciales del usuario del servidor, por cuestiones de seguridad

}else {
    echo "Found errors receiving POST data";
}
?>
