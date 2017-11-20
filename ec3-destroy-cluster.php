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

if($_POST){
   
    $datosRecibidos = file_get_contents('php://input'); 
   
    // El string recibido tiene este aspecto: clustername=safsdfv3
    
    $stringSpliteado = explode('&', $datosRecibidos);
    $clustername = explode('=', $stringSpliteado[0]);
    $clustername = urldecode($clustername[1]);

    //comprobamos si nos han pasado proxy
    $proxy = explode('=', $stringSpliteado[1]);
    if(count($proxy) > 1){
        $proxy = urldecode($proxy[1]);
    } else {
        $proxy = "";
    }
    if($proxy!=""){
        $auth_file = "/tmp/auth_" .substr($clustername, 8);
        //tratamos la cadena del proxy
        $proxy = str_replace("\r\n", "\\n", $proxy);
        
        //ahora recuperamos la linea de credenciales del IM
        $im_line="";
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
        //Y escribimos el nuevo fichero auth
        $gestor = fopen($auth_file, "w");
        fwrite($gestor, "id = occi; type = OCCI; proxy = " . $proxy . "; host = " . $endpoint . PHP_EOL);
        fwrite($gestor, $im_line. PHP_EOL);
        fclose($gestor);
    }

    // llamamos a EC3 para comprobar si el cluster existe:
    /*$ec3_list_file = "/tmp/ec3_list_".random_string(5);
    $process_1 = new Process("./command/ec3 list -r ", $ec3_list_file);
    $process_1->start();
  
    sleep(1);
    $log_content = file_get_contents($ec3_list_file);
    if(strpos($log_content, $clustername) === False){
        echo "Problems deleting the cluster. Is the name correct?";
        exit (1);
    }*/

    // llamamos a EC3 para eliminar el cluster
    //$ec3_log_file = "/tmp/ec3_del_".random_string(5);
	$ec3_log_file = "/tmp/ec3_del_".substr($clustername, 8);
    if($auth_file != ""){
        $process_2 = new Process("./command/ec3 destroy --yes -a " . $auth_file. " " . $clustername, $ec3_log_file);
    } else {
        $process_2 = new Process("./command/ec3 destroy --yes " . $clustername, $ec3_log_file);
    }
    $pid = $process_2->start();
    // Comprobamos si se ha eliminado correctamente
    $status = False;
    sleep(2);
    $log_content = file_get_contents($ec3_log_file);
    //if(strpos($log_content, "Success") === True){
    //if(strpos($log_content, "Error") === False && strpos($log_content, "not found") === False){
    if(strpos($log_content, "Error") === False){
        $status = True;
    }
    
    if($status){
        echo "{}";
    } else{
        echo "Problems deleting the cluster. Is the name correct?";
    }
    // TODO: borrar el fichero auth* con las credenciales del usuario del servidor, por cuestiones de seguridad

}else {
    echo "Found errors receiving POST data";
}
?>
