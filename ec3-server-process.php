<?php
//Tuto basico de PHP: http://www.w3schools.com/php/php_variables.asp

//PHP is NOT case-sensitive BUT variable names are case-sensitive
//LOS ECHO VAN DIRECTOS AL CLIENTE, PARECE QUE LOS PRINT NO

//AJAX y PHP: http://www.w3schools.com/php/php_ajax_php.asp
//Funcion PHP para ejecutar un comando linux: http://php.net/manual/en/function.exec.php
//Funcion PHP para ejecutar un comando shell: http://php.net/manual/en/function.shell-exec.php

//funcion AJAX de Jquery para enviar los datos al servidor: http://api.jquery.com/jquery.ajax/ (estan explicados todos los formatos disponibles)
//AJAX envia los datos en UTF-8, si no se ven bien probar: http://www.desarrolloweb.com/articulos/convertir-caracteres-utf-8-con-php.html

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
    if (isset($GLOBALS["EC3UnitTest"])) return "line1\nline2\nline3";   

    return $result;
}

//NOTA: no es posible la sobrecarga de metodos en PHP porque solo tiene en cuenta el nombre, no los parametros

// Generates the auth file for FedCloud deployments
//function generate_auth_file_fedcloud($proxy, $endpoint, $myproxyserver, $myproxyuser, $myproxypass) {
function generate_auth_file_fedcloud($endpoint, $clustername) {
    //$auth = '';
    //$auth = tempnam("/tmp", "auth_");
    $auth = "/tmp/auth_" . $clustername;
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //id = occi; type = OCCI; proxy = file(/tmp/proxy.pem); host = https://stack-server-01.ct.infn.it:8787
    //id = occi; type = OCCI; proxy = asdasd; host = https://stack-server-01.ct.infn.it:8787
    
    if(!isset($_SESSION)) session_start();

    if (!isset($_SESSION["egi_user_sub"])) {
        //echo "Error no unity user ID obtained.";
        header('Location:session_expired.html');
        die();
    } else {
        $user_sub = $_SESSION["egi_user_sub"];
    }

#    $proxy = getSSLPage("https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/08b435574d4f19c734f19514828ad0ab?voms=vo.access.egi.eu:/vo.access.egi.eu&proxy-renewal=true&disable-voms-proxy=false&rfc-proxy=true&cn-label=eToken:" . $user_sub);
    $proxy = getSSLPage("https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/9001b766b88b2090418aa99b020755b9?voms=vo.access.egi.eu:/vo.access.egi.eu&proxy-renewal=true&disable-voms-proxy=false&rfc-proxy=true&cn-label=eToken:" . $user_sub);
    $proxy = str_replace("\n", "\\n", $proxy);
    
    $gestor = fopen($auth, "w");
    fwrite($gestor, "id = occi; type = OCCI; proxy = " . $proxy . "; host = " . $endpoint . PHP_EOL);
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    fclose($gestor);

    //to delete an empty file that tempnam creates
    //unlink($auth);
    return $auth;
}


// Generates the auth file for OTC Tsystems deployments
function generate_auth_file_otc($endpoint, $clustername, $username, $pass, $tenant, $domain, $auth_version, $service_name, $service_region) {
    $auth = "/tmp/auth_" . $clustername;
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //id = otc; type = OpenStack; host = https://iam.eu-de.otc.t-systems.com:443 ; username = user; password = pass; tenant = tenant; domain = domain; auth_version = 3.x_password; service_name = None; service_region = eu-de
    
    $gestor = fopen($auth, "w");
    fwrite($gestor, "id = otc; type = OpenStack; host = " . $endpoint . "; username = '" . $username . "'; password = '" . $pass . "'; tenant = " . $tenant . "; domain = " . $domain . "; auth_version = " . $auth_version . "; service_name = " . $service_name . "; service_region = " . $service_region . PHP_EOL);
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    fclose($gestor);

    return $auth;
}


// Generates the auth file for Exoscale deployments
//function generate_auth_file_fedcloud($proxy, $endpoint, $myproxyserver, $myproxyuser, $myproxypass) {
function generate_auth_file_exoscale($endpoint, $clustername, $apikey, $secretkey) {
    $auth = "/tmp/auth_" . $clustername;
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //id = exoscale; type = CloudStack; username = apikey; password = secret; host = http://api.exoscale.ch/compute
    
    $gestor = fopen($auth, "w");
    fwrite($gestor, "id = exoscale; type = CloudStack; username = '" . $apikey . "'; password = '" . $secretkey ."'; host = " . $endpoint . PHP_EOL);
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    fclose($gestor);

    return $auth;
}


// Generates the system RADL file for the deployments that the user has indicated an AMI or VMI
//function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes, $os) {
function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes){
    $rand_str = random_string(4); 
    $templates_path = (isset($GLOBALS['templates_path']) ? $GLOBALS['templates_path'] : "/var/www/html/ec3-ltos/command/templates");
    $path_to_new_file = $templates_path . '/system_'.$rand_str.'.radl';
    $file_name = 'system_'.$rand_str;
    
    // Obtenemos user y pass random
    $fcuser = 'cloudadm';
    $pass = random_string(3).'#'. random_string(3).'5A';

    //obtain UNITY user
    if(!isset($_SESSION)) session_start();

    if (!isset($_SESSION["egi_user_sub"]) or $_SESSION["egi_user_sub"] == "") {
        header('Location:session_expired.html');
    } else {
        $user_sub = $_SESSION["egi_user_sub"];
        $user_name = $_SESSION["egi_user_name"];
    }

    $new_file = fopen($path_to_new_file, "w");
    //SYSTEM FRONT
    fwrite($new_file, "system front (".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);

    //fwrite($new_file, "    disk.0.image.url = '".$region. "/" .$ami. "' and".PHP_EOL);
    //Depende del cloud el formato de URL cambia:
    if ($cloud == 'fedcloud'){
        fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?vo.access.egi.eu' and".PHP_EOL);
    } else if ($cloud == 'exoscale'){
        fwrite($new_file, "    disk.0.image.url = 'cst://api.exoscale.ch/" .$ami. "' and".PHP_EOL);
    } else { //cloud=t-systems
        /*$region = explode(':', $region);
        if(strpos($region[0], 'http') !== false){
            $region = $region[1];
        } else{
            $region = "//" . $region[0];
        }*/
        fwrite($new_file, "    disk.0.image.url = 'ost://iam.eu-de.otc.t-systems.com/" .$ami. "' and".PHP_EOL);
    }
    
    fwrite($new_file, "    instance_type='".$instancetype_front."' and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."' and".PHP_EOL);
    fwrite($new_file, "    ec3aas.username = '".$user_sub."'".PHP_EOL);
    
    fwrite($new_file, ")".PHP_EOL);
    fwrite($new_file, PHP_EOL);

    // SYSTEM WN
    fwrite($new_file, "system wn (".PHP_EOL);
    fwrite($new_file, "    ec3_max_instances = ".$nodes." and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);

    //Depende del cloud el formato de URL cambia:
    if ($cloud == 'fedcloud'){
        fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?vo.access.egi.eu' and".PHP_EOL);
    } else if ($cloud == 'exoscale'){
        fwrite($new_file, "    disk.0.image.url = 'cst://api.exoscale.ch/" .$ami. "' and".PHP_EOL);
    } else { //cloud=t-systems
        /*$region = explode(':', $region);
        if(strpos($region[0], 'http') !== false){
            $region = $region[1];
        } else{
            $region = "//" . $region[0];
        }*/
        fwrite($new_file, "    disk.0.image.url = 'ost://iam.eu-de.otc.t-systems.com/" .$ami. "' and".PHP_EOL);
    }
    fwrite($new_file, "    instance_type='".$instancetype_wn."' and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."'".PHP_EOL);

    fwrite($new_file, ")".PHP_EOL);
    
    fclose($new_file);
    
    return array($file_name, $fcuser, $pass);
}


if($_POST){
    //echo "recibo algo POST";
    //echo "{}"
    $possible_sw = array("nfs", "openvpn", "octave", "docker", "gnuplot", "tomcat", "galaxy", "marathon", "chronos", "hadoop", "namd", "extra_hd");    

    // El string recibido tiene este aspecto: cloud=ec2&accesskey=ffffff&secretkey=hhhhhhhhh&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=5
    // Pero tenemos que devolver un JSON si todo ha ido bien
    //json_encode($stringSpliteado);

    $provider = (isset($_POST['cloud']) ? $_POST['cloud'] : "unknown");
    
    if ($provider == 'fedcloud'){
        $endpointName = (isset($_POST['endpointName']) ? $_POST['endpointName'] : "");
        $endpoint = (isset($_POST['endpoint-fedcloud']) ? $_POST['endpoint-fedcloud'] : "");
        $vmi = (isset($_POST['vmi-fedcloud']) ? $_POST['vmi-fedcloud'] : "");

        if($vmi == ''){
            echo 'Image ID not provided. Impossible to launch a cluster without these data. Please, enter the required information and try again.';
            exit(1);
        }

        $front_type = (isset($_POST['front-fedcloud']) ? $_POST['front-fedcloud'] : "");
        $wn_type = (isset($_POST['wn-fedcloud']) ? $_POST['wn-fedcloud'] : "");

        $lrms = (isset($_POST['lrms-fedcloud']) ? $_POST['lrms-fedcloud'] : "");
        
        if($lrms == '' ){
            echo 'LRMS not provided. Impossible to launch a cluster without this data. Please, enter the required information and try again.';
            exit(1);
        }
        
        $sw = "clues2 myproxy_ltos ";
        foreach ($possible_sw as $item_sw) {
            if (isset($_POST[$item_sw])) {
                $sw .= $item_sw . " ";
            }
        }

        $nodes = (isset($_POST['nodes-fedcloud']) ? $_POST['nodes-fedcloud'] : "1");
        
        $cluster_name = (isset($_POST['cluster-name']) ? $_POST['cluster-name'] : "");
        
        $user_sub = $_SESSION["egi_user_sub"];
        
        if(!isset($_SESSION)) session_start();
        if (!isset($_SESSION["egi_user_sub"])) {
            //$user_sub = random_string(5);
            header('Location:session_expired.html');
            die();
        } else {
            $user_sub = $_SESSION["egi_user_sub"];
        }
        
        $name = $cluster_name . "__" . $user_sub;
        $lrms = strtolower($lrms);
        $sw = strtolower($sw);

        $auth_file = generate_auth_file_fedcloud($endpoint, $name);

        $data = generate_system_image_radl($provider, $vmi, $endpointName, '', '', $front_type, $wn_type, '', '', '', '', $nodes);

        $os = $data[0];
        $user = $data[1];
        $pass = $data[2];
    } else if ($provider == 'helixnebula'){
        $cloud = (isset($_POST['provider-helix']) ? $_POST['provider-helix'] : "");
        $cloud = strtolower($cloud);
        
        //Endpoint is now fixed 
        //$endpointName = (isset($_POST['endpointName']) ? $_POST['endpointName'] : "");
        //$endpoint = (isset($_POST['endpoint-helix']) ? $_POST['endpoint-helix'] : "");
        if($cloud == 'exoscale'){
             $endpoint = "http://api.exoscale.ch/compute";
        }
        else {
            $endpoint = "https://iam.eu-de.otc.t-systems.com:443";
        }
        
        $apikey = (isset($_POST['apikey-helix']) ? $_POST['apikey-helix'] : "");
        $secretkey = (isset($_POST['secretkey-helix']) ? $_POST['secretkey-helix'] : "");
        
        //obtener tennat y projectID. Si estan vacios y se ha seleccionado OTC, devolver directamente un error al usuario
        $domain = (isset($_POST['domain-otc-helix']) ? $_POST['domain-otc-helix'] : "");
        $projectID = (isset($_POST['project-otc-helix']) ? $_POST['project-otc-helix'] : "");
        
        $vmi = (isset($_POST['vmihelix']) ? $_POST['vmihelix'] : "");
        if($vmi == ''){
            echo 'Image ID not provided. Impossible to launch a cluster without these data. Please, enter the required information and try again.';
            exit(1);
        }

        $front_type = (isset($_POST['fronthelix']) ? $_POST['fronthelix'] : "");
        $wn_type = (isset($_POST['wnhelix']) ? $_POST['wnhelix'] : "");

        $lrms = (isset($_POST['lrms-helix']) ? $_POST['lrms-helix'] : "");
        
        if($lrms == '' ){
            echo 'LRMS not provided. Impossible to launch a cluster without this data. Please, enter the required information and try again.';
            exit(1);
        }
        
        $sw = "clues2 myproxy_ltos ";
        foreach ($possible_sw as $item_sw) {
            if (isset($_POST[$item_sw])) {
                $sw .= $item_sw . " ";
            }
        }

        $nodes = (isset($_POST['nodes-helix']) ? $_POST['nodes-helix'] : "1");
        
        $cluster_name = (isset($_POST['cluster-name-helix']) ? $_POST['cluster-name-helix'] : "");
        
        $clean_apikey = preg_replace('/\s+/', '_', $apikey);
        $name = $cluster_name . "__" . $clean_apikey;
        $lrms = strtolower($lrms);
        $sw = strtolower($sw);

        if ($cloud == 'exoscale') {
            $auth_file = generate_auth_file_exoscale($endpoint, $name, $apikey, $secretkey);
        } else {
            if ($domain == '' || $projectID == '' ){
                echo 'Domain or project ID not provided in a OTC deployment. Impossible to launch a cluster without these data. Please, enter the required information and try again.';
                exit(1);
            }
            $auth_file = generate_auth_file_otc($endpoint, $name, $apikey, $secretkey, 'eu-de', $domain, '3.x_password', 'None', 'eu-de');
        }
        
        $data = generate_system_image_radl($cloud, $vmi, $endpoint, '', '', $front_type, $wn_type, '', '', '', '', $nodes);

        $os = $data[0];
        $user = $data[1];
        $pass = $data[2];
    } else {
        echo 'Unknown provider';
        exit(1);
    }

    /*if($auth_file != ""){
        $rand = substr($auth_file, 10);
    } else {
        $rand = random_string(5);
    }
    $name = "cluster_" . $rand;
    
    */

    // Modificamos el numero maximo de nodos del cluster
    /*$path_to_file = '/var/www/html/ec3/command/templates/'.$os.".radl";
    $file_contents = file_get_contents($path_to_file);
    $file_contents = preg_replace('~ec3_max_instances = [0-9]+~', "ec3_max_instances = " .$nodes, $file_contents); 
    file_put_contents($path_to_file,$file_contents);*/
    
    //Hay que hacer una llamada al comando EC3 de la forma: $ ./ec3 launch mycluster slurm clues2 ubuntu-vmrc -a auth.dat -u http://servproject.i3m.upv.es:8899
    //-q para que no muestre el gusano y -y para que no pregunte lo de la conexion segura
    // quitamos el -q para que muestre el error, si ocurre, en el log

    $ec3_log_file = "/tmp/ec3_log_".$name;
    //$process = new Process("./command/ec3 -q launch -y " . $name . " " . $lrms . " " . $sw . $os . " -a " . $auth_file . " -u http://servproject.i3m.upv.es:8899", $ec3_log_file);
    /*if($lrms=='mesos'){
        $lrms = 'docker mesos';
    }*/
        
    $process = new Process("./command/ec3 launch -y " . $name . " " . $lrms . " " . $sw . $os . " -a " . $auth_file, $ec3_log_file);
    $process->start();
    
    // Recuperamos la salida del comando ec3 (con el fichero que guarda en /tmp)
    /* El contenido del fichero tiene la forma:
        1047
        Front-end state: pending, IP: 158.42.105.207Front-end state: running, IP: 158.42.105.207
    */

    $ip = " ";
    $cond = False;
    while(!$cond){
        sleep(5);
        $log_content = file_get_contents($ec3_log_file);
        if(strpos($log_content, "running") && strpos($log_content, "IP:")){
            $ip = substr($log_content, strrpos($log_content, "IP:") + 4);
            $cond = True;
        } elseif(!$process->status()){
            if(strpos($log_content, "Error") && strpos($log_content, "Attempt 1:")){
                echo "Found problems deploying your cluster " . $cluster_name. ": ". substr($log_content, strpos($log_content, "Attempt 1:") + 10);
            } else{
                echo "Unexpected problems deploying the cluster ". $cluster_name .". Check the introduced data and try again. If the error persists, please contact us.";
            }
            $ec3_del_file = "/tmp/ec3_del_".$name;
            $process_2 = new Process("./command/ec3 destroy --yes --force " . $name, $ec3_del_file);
            $process_2->start(); 
            exit(1);
        }
    }    

    //Si ya esta running, podemos obtener la clave privada generada por el im para conectarnos al frontend
    $ec3_ssh_file = "/tmp/ec3_ssh_".$name;
    $process_ssh = new Process("./command/ec3 ssh " . $name . "  --show-only ", $ec3_ssh_file);
    $process_ssh->start();
    sleep(1);
    
    //Ahora procesamos la salida y leemos el fichero temporal donde se guarda la clave privada
    $ssh_response = file_get_contents($ec3_ssh_file);
    //$path_to_key = substr($ssh_response, strpos(ssh_response, "-i " )+3, strpos(ssh_response, " -o" ) - (strpos(ssh_response, "-i " )+3));
    $path_to_key = substr($ssh_response, 7, 14);
    if($path_to_key != ""){
        $secret_key = rawUrlEncode(file_get_contents($path_to_key));
    } else {
        echo "Error getting secret key info. File not exists.";
        exit(1);
    }

    //Devolvemos los datos del front-end desplegado
    echo "{\"ip\":\"$ip\",\"name\":\"$cluster_name\",\"username\":\"$user\",\"secretkey\":\"$secret_key\"}";
}else {
    echo "Found errors receiving POST data";
}
?>
