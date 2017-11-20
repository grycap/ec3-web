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
    return $result;
}

//NOTA: no es posible la sobrecarga de metodos en PHP porque solo tiene en cuenta el nombre, no los parametros

// Generates the auth file for Amazon EC2 deployments
function generate_auth_file_ec2($accesskey, $secretkey) {
    $auth = '';
    $auth = tempnam("/tmp", "auth_");
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //type = EC2; username = AAAAAAAAAAAAAAAAA; password = 5555555555555555555555; id = ec2
    $gestor = fopen($auth, "w");
    fwrite($gestor, "type = EC2; username = " . $accesskey . "; password = " . $secretkey . "; id = ec2". PHP_EOL);
    
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    //fwrite($gestor, "type = VMRC; host = http://servproject.i3m.upv.es:8080/vmrc/vmrc; username = micafer; password = ttt25");
    fclose($gestor);

    //to delete an empty file that tempnam creates
    //unlink($auth);
    return $auth;
}

// Generates the auth file for Opennebula deployments
function generate_auth_file_one($username, $pass, $endpoint) {
    $auth = '';
    $auth = tempnam("/tmp", "auth_");
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //type = OpenNebula; host = ramses.i3m.upv.es:2633; username = monchi; password = tititi; id = one
    $gestor = fopen($auth, "w");
    fwrite($gestor, "type = OpenNebula; host = " . $endpoint . "; username = " . $username . "; password = " . $pass . "; id = one". PHP_EOL);
    
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    //fwrite($gestor, "type = VMRC; host = http://servproject.i3m.upv.es:8080/vmrc/vmrc; username = micafer; password = ttt25");
    fclose($gestor);

    //to delete an empty file that tempnam creates
    //unlink($auth);
    return $auth;
}

// Generates the auth file for Openstack deployments
function generate_auth_file_openstack($username, $pass, $endpoint, $tenant) {
    $auth = '';
    $auth = tempnam("/tmp", "auth_");
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //id = ost; type = OpenStack; host = oscloud.i3m.upv.es:5000; username = demo; password = demo; tenant = demo
    $gestor = fopen($auth, "w");
    fwrite($gestor, "id = ost; type = OpenStack; host = " . $endpoint . "; username = " . $username . "; password = " . $pass . "; tenant = ".$tenant. PHP_EOL);
    
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    //fwrite($gestor, "type = VMRC; host = http://servproject.i3m.upv.es:8080/vmrc/vmrc; username = micafer; password = ttt25");
    fclose($gestor);

    //to delete an empty file that tempnam creates
    //unlink($auth);
    return $auth;
}

// Generates the auth file for FedCloud deployments
//function generate_auth_file_fedcloud($proxy, $endpoint, $myproxyserver, $myproxyuser, $myproxypass) {
function generate_auth_file_fedcloud($endpoint) {
    $auth = '';
    $auth = tempnam("/tmp", "auth_");
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //id = occi; type = OCCI; proxy = file(/tmp/proxy.pem); host = https://stack-server-01.ct.infn.it:8787
    //id = occi; type = OCCI; proxy = asdasd; host = https://stack-server-01.ct.infn.it:8787
    
    //obtenemos el proxy
    //https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/332576f78a4fe70a52048043e90cd11f?voms=fedcloud.egi.eu:/fedcloud.egi.eu&proxy-renewal=false&disable-voms-proxy=false&rfc-proxy=true&cn-label=user:micafer
    //"https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/332576f78a4fe70a52048043e90cd11f?voms=fedcloud.egi.eu:/fedcloud.egi.eu&proxy-renewal=false&disable-voms-proxy=false&rfc-proxy=true&cn-label=ec3:" . $user_sub
    if ( !session_id() ) {
            session_start();
    }

    if (!isset($_SESSION["egi_user_sub"])) {
        //echo "Error no unity user ID obtained.";
        header('Location:session_expired.html');
        die();
    } else {
        $user_sub = $_SESSION["egi_user_sub"];
    }

    //$proxy = file_get_contents("https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/332576f78a4fe70a52048043e90cd11f?voms=vo.access.egi.eu:/vo.access.egi.eu&proxy-renewal=true&disable-voms-proxy=false&rfc-proxy=true&cn-label=eToken:" . $user_sub);
    $proxy = getSSLPage("https://etokenserver.ct.infn.it:8443/eTokenServer/eToken/332576f78a4fe70a52048043e90cd11f?voms=vo.access.egi.eu:/vo.access.egi.eu&proxy-renewal=true&disable-voms-proxy=false&rfc-proxy=true&cn-label=eToken:" . $user_sub);
    $proxy = str_replace("\n", "\\n", $proxy);
    
    $gestor = fopen($auth, "w");
    //if($myproxyserver != '' && $myproxyuser != '' && $myproxypass != ''){
    //    fwrite($gestor, "id = occi; type = OCCI; proxy = " . $proxy . "; myproxyserver = " .$myproxyserver. "; myproxyuser = " . $myproxyuser . "; myproxypass = " . $myproxypass . "; host = " . $endpoint . PHP_EOL);
    //} else{
    fwrite($gestor, "id = occi; type = OCCI; proxy = " . $proxy . "; host = " . $endpoint . PHP_EOL);
    //}
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    //fwrite($gestor, "type = VMRC; host = http://servproject.i3m.upv.es:8080/vmrc/vmrc; username = micafer; password = ttt25");
    fclose($gestor);

    //to delete an empty file that tempnam creates
    //unlink($auth);
    return $auth;
}


// Generates the system RADL file for the deployments that the user has indicated an AMI or VMI
//function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes, $os) {
function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes){
    $rand_str = random_string(4); 
    $path_to_new_file = '/var/www/html/ec3-ltos/command/templates/system_'.$rand_str.'.radl';
    $file_name = 'system_'.$rand_str;
    
    // Obtenemos user y pass random
    $userpass = get_vmi_credentials('Ubuntu 12.04');
    $user = $ami_user;
    $pass = $userpass[1];
    
    $fcuser = 'cloudadm';
    //obtain UNITY user
    if ( !session_id() ) {
        session_start();
    }

    if (!isset($_SESSION["egi_user_sub"]) or $_SESSION["egi_user_sub"] == "") {
        include('auth.php');
    } else {
        $user_sub = $_SESSION["egi_user_sub"];
        $user_name = $_SESSION["egi_user_name"];
    }

    $new_file = fopen($path_to_new_file, "w");
    fwrite($new_file, "system front (".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);
    if($cloud == 'ec2'){
        //disk.0.image.url = 'aws://us-east-1/ami-e50e888c' and
        fwrite($new_file, "    disk.0.image.url = 'aws://".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    instance_type='".$instancetype_front."' and".PHP_EOL);
    } elseif($cloud == 'fedcloud'){
        $user=$fcuser;
        //fwrite($new_file, "    disk.0.image.url = '".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?vo.access.egi.eu' and".PHP_EOL);
        //fwrite($new_file, "    instance_type='".$instancetype_front."'".PHP_EOL);
        fwrite($new_file, "    instance_type='".$instancetype_front."' and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."' and".PHP_EOL);
        fwrite($new_file, "    ec3aas.username = '".$user_sub."'".PHP_EOL);
    } elseif($cloud == 'one'){
        //disk.0.image.url = 'one://ramses.i3m.upv.es/81' and
        $region = explode(':', $region);
        if(strpos($region[0], 'http') !== false){
            $region = $region[1];
        } else{
            $region = "//" . $region[0];
        }
        fwrite($new_file, "    disk.0.image.url = 'one:".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    cpu.count>=".$front_cpu." and".PHP_EOL);
        fwrite($new_file, "    memory.size>=".$front_mem."m and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.password = '".$ami_password."' and".PHP_EOL);
    } else { //cloud=openstack
        $region = explode(':', $region);
        if(strpos($region[0], 'http') !== false){
            $region = $region[1];
        } else{
            $region = "//" . $region[0];
        }
        fwrite($new_file, "    disk.0.image.url = 'ost:".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    cpu.count>=".$front_cpu." and".PHP_EOL);
        fwrite($new_file, "    memory.size>=".$front_mem."m and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.username = '".$ami_user."'".PHP_EOL);
    }
    if($cloud != 'openstack' && $cloud != 'fedcloud'){
        fwrite($new_file, "    disk.0.os.credentials.username = '".$ami_user."' and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.new.username = '".$user."' and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.new.password = '".$pass."'".PHP_EOL);
    }
    
    fwrite($new_file, ")".PHP_EOL);
    fwrite($new_file, PHP_EOL);

    fwrite($new_file, "system wn (".PHP_EOL);
    fwrite($new_file, "    ec3_max_instances = ".$nodes." and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);
    if($cloud == 'ec2'){
        //disk.0.image.url = 'aws://us-east-1/ami-e50e888c' and
        fwrite($new_file, "    disk.0.image.url = 'aws://".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    instance_type='".$instancetype_wn."' and".PHP_EOL);
    } elseif($cloud == 'fedcloud'){
        fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?vo.access.egi.eu' and".PHP_EOL);
        //fwrite($new_file, "    disk.0.image.url = '".$region. "/" .$ami. "' and".PHP_EOL);
        //fwrite($new_file, "    instance_type='".$instancetype_wn."'".PHP_EOL);
        fwrite($new_file, "    instance_type='".$instancetype_wn."' and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."'".PHP_EOL);
    } elseif($cloud =='one'){
        //disk.0.image.url = 'one://ramses.i3m.upv.es/81' and
        //$region = explode(':', $region);
        //if(strpos($region[0], 'http') !== false){
        //    $region = $region[1];
        //} else{
        //    $region = "//" . $region[0];
        //}
        fwrite($new_file, "    disk.0.image.url = 'one:".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    cpu.count>=".$wn_cpu." and".PHP_EOL);
        fwrite($new_file, "    memory.size>=".$wn_mem."m and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.password = '".$ami_password."' and".PHP_EOL);
    } else {//cloud=openstack
        //$region = explode(':', $region);
        //if(strpos($region[0], 'http') !== false){
        //    $region = $region[1];
        //} else{
        //    $region = "//" . $region[0];
        //}
        fwrite($new_file, "    disk.0.image.url = 'ost:".$region. "/" .$ami. "' and".PHP_EOL);
        fwrite($new_file, "    cpu.count>=".$wn_cpu." and".PHP_EOL);
        fwrite($new_file, "    memory.size>=".$wn_mem."m and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.username = '".$ami_user."'".PHP_EOL);
    }

    if($cloud != 'openstack' && $cloud != 'fedcloud'){
        fwrite($new_file, "    disk.0.os.credentials.username = '".$ami_user."' and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.new.username = '".$user."' and".PHP_EOL);
        fwrite($new_file, "    disk.0.os.credentials.new.password = '".$pass."'".PHP_EOL);
    }
    
    fwrite($new_file, ")".PHP_EOL);
    
    fclose($new_file);
    
    return array($file_name, $user, $pass);
}

// Generates the system RADL file for the deployments that the user DOES NOT has indicated an AMI or VMI
function generate_system_template_radl($cloud, $os, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes){
    $rand_str = random_string(4); 
    $path_to_new_file = '/var/www/html/ec3-ltos/command/templates/'.$os.'-'.$cloud.'_'.$rand_str.'.radl';
    $file_name = $os.'-'.$cloud.'_'.$rand_str;
    $path_to_template = '/etc/ec3/templates/'.$os.'-'.$cloud.".radl";

    $new_file = fopen($path_to_new_file, "w");
    $template_file = fopen($path_to_template, "r");
    if($template_file != False){
        while(!feof($template_file)) {
            $line = fgets($template_file);
            fwrite($new_file, $line);
        }
    }

    fclose($template_file);
    fclose($new_file);
    
    // Obtenemos user y pass de la imagen
    $userpass = get_vmi_credentials($os);
    $user = $userpass[0];
    $pass = $userpass[1];
    if($cloud == 'one'){
        $file_contents = file_get_contents($path_to_new_file);
        $file_contents = str_replace("#INSTANCES#",$nodes,$file_contents);
        $file_contents = str_replace("#CPU_FRONT#",$front_cpu,$file_contents);
        $file_contents = str_replace("#MEM_FRONT#",$front_mem."m",$file_contents);
        $file_contents = str_replace("#CPU_WN#",$wn_cpu,$file_contents);
        $file_contents = str_replace("#MEM_WN#",$wn_mem."m",$file_contents);
        //$file_contents = str_replace("#USER#",$user,$file_contents);
        $file_contents = str_replace("#PASSWORD#",$pass,$file_contents);
        file_put_contents($path_to_new_file,$file_contents);
    } elseif ($cloud == 'openstack') {
        $file_contents = file_get_contents($path_to_new_file);
        $file_contents = str_replace("#INSTANCES#",$nodes,$file_contents);
        $file_contents = str_replace("#CPU_FRONT#",$front_cpu,$file_contents);
        $file_contents = str_replace("#MEM_FRONT#",$front_mem."m",$file_contents);
        $file_contents = str_replace("#CPU_WN#",$wn_cpu,$file_contents);
        $file_contents = str_replace("#MEM_WN#",$wn_mem."m",$file_contents);
        file_put_contents($path_to_new_file,$file_contents);
    } elseif ($cloud == 'fedcloud'){
        $file_contents = file_get_contents($path_to_new_file);
        $file_contents = str_replace("#INSTANCES#",$nodes,$file_contents);
        $file_contents = str_replace("#INSTANCE_TYPE_FRONT#", $instancetype_front, $file_contents);
        $file_contents = str_replace("#INSTANCE_TYPE_WN#", $instancetype_wn, $file_contents);
        //fwrite($new_file, "    ec3aas.username = '".$user_sub."'".PHP_EOL);
        file_put_contents($path_to_new_file,$file_contents);
    } else{ //$cloud=ec2
        $file_contents = file_get_contents($path_to_new_file);
        $file_contents = str_replace("#INSTANCES#",$nodes,$file_contents);
        $file_contents = str_replace("#INSTANCE_TYPE_FRONT#", $instancetype_front, $file_contents);
        $file_contents = str_replace("#INSTANCE_TYPE_WN#", $instancetype_wn, $file_contents);
        //$file_contents = str_replace("#USER#",$user,$file_contents);
        $file_contents = str_replace("#PASSWORD#",$pass,$file_contents);
        file_put_contents($path_to_new_file,$file_contents);
    }
    if($cloud == 'fedcloud'){
        $user = 'cloudadm';
    }
    return array($file_name, $user, $pass);
}

// Translates the OS name to the name of the EC3 recipe
function translate_os($os) {
    switch ($os) {
        case "Ubuntu 12.04":
            $os = "ubuntu12";
            break;
        case "Ubuntu 14.04":
            $os = "ubuntu14";
            break;
        case "CentOS 7":
            $os = "centos7";
            break;
        case "CentOS 6.5":
            $os = "centos";
            break;
        case "CentOS 6":
            $os = "centos";
            break;
        case "Scientific Linux":
            $os = "sl";
            break;
    }
    return $os;
}

// Translates the LRMS name to the name of the EC3 recipe
/*function translate_lrms($lrms) {
    switch ($lrms) {
        case "SLURM":
            $lrms = "slurm";
            //$lrms = "slurm-repo"
            break;
        case "Torque":
            $lrms = "torque";
            break;
        case "SGE":
            $lrms = "sge";
            break;
        default:
            $lrms = "slurm";
    }
    return $lrms;
}*/

// Provides user and password for the VMI
function get_vmi_credentials($os){
    $user = " ";
    $pass = " ";
    switch ($os) {
        case "ubuntu12":
            $user = "ubuntu";
            $pass = random_string(3).'#'. random_string(3).'5A';
            break;
        case "ubuntu14":
            $user = "ubuntu";
            $pass = random_string(3).'&'. random_string(3).'0Z';;
            break;
        case "centos":
            $user = "root";
            $pass = random_string(3).'%'. random_string(3).'X1';
            break;
        case "centos7":
            $user = "root";
            $pass = random_string(3).'?'. random_string(3).'D2';
            break;
        default: //for the ones that have provided a vmi
            $user = "ubuntu";
            $pass = random_string(3).'!'. random_string(3).'F4';
            
    }
    return array($user, $pass);
}

function validateAMIValue($ami) {
    if (strlen($ami) > 12 || strlen($ami) < 12 ){
        return False;
    } else if ($ami{0} != 'a' && $ami{1} != 'm' && $ami{2} != 'i' && $ami{3} != '-') {
        return False;
    } else {
        return True;
    }
    return True;
};

if($_POST){
    //echo "recibo algo POST";
    //echo "{}";
    $possible_sw = array("nfs", "maui", "openvpn", "octave", "docker", "gnuplot", "tomcat", "galaxy", "marathon", "chronos", "hadoop", "namd", "extra_hd");
 
    $datosRecibidos = file_get_contents('php://input'); 

    // El string recibido tiene este aspecto: cloud=ec2&accesskey=ffffff&secretkey=hhhhhhhhh&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=5
    // Pero tenemos que devolver un JSON si todo ha ido bien
    //json_encode($stringSpliteado);
  
    $stringSpliteado = explode('&', $datosRecibidos);
    $cloud = explode('=', $stringSpliteado[0]);
    $provider = $cloud[1];
    
    if ($provider == 'fedcloud'){
        $endpointName = explode('=', $stringSpliteado[1]);
        $endpointName = urldecode($endpointName[1]);        
        
        $endpoint = explode('=', $stringSpliteado[2]);
        $endpoint = urldecode($endpoint[1]);
        
        //$proxy = explode('=', $stringSpliteado[2]);
        //$proxy = urldecode($proxy[1]);
        
        //MyProxy section
        //$myproxyuser = explode('=', $stringSpliteado[3]);
        //$myproxyuser = urldecode($myproxyuser[1]);
        
        //$myproxypass = explode('=', $stringSpliteado[4]);
        //$myproxypass = urldecode($myproxypass[1]);
        
        //$myproxyserver = explode('=', $stringSpliteado[5]);
        //$myproxyserver = urldecode($myproxyserver[1]);

        /*$os = explode('=', $stringSpliteado[3]);
        $os = urldecode($os[1]);*/
        
        $vmi = explode('=', $stringSpliteado[3]);
        $vmi = urldecode($vmi[1]);
        
        //if($os == '' && $vmi == ''){
        if($vmi == ''){
            echo 'OS or Image ID not provided. Impossible to launch a cluster without these data. Please, enter the required information and try again.';
            exit(1);
        }
        
        $front_type = explode('=', $stringSpliteado[4]);
        $front_type = urldecode($front_type[1]);
        $wn_type = explode('=', $stringSpliteado[5]);
        $wn_type = urldecode($wn_type[1]);

        $lrms = explode('=', $stringSpliteado[6]);
        $lrms = $lrms[1];
        
        if($lrms == '' ){
            echo 'LRMS not provided. Impossible to launch a cluster without this data. Please, enter the required information and try again.';
            exit(1);
        } elseif ($lrms == 'Torque'){
            # the site is not openstack
            if (strpos($endpoint,":8787") === false) {
                $lrms = 'torque';
            }
        } elseif(strpos($lrms, 'Mesos') !== false) {
            $lrms = 'mesos';
        }
        
        $sw = "clues2 myproxy_ltos ";
        #if($myproxyserver != '' && $myproxyuser != '' && $myproxypass != ''){
        #    $sw .= "myproxy ";
        #}
        for ($i=7; $i < count($stringSpliteado)-2; $i++){
            $aux = explode('=', $stringSpliteado[$i]);
            if (in_array($aux[0], $possible_sw)) {
        if ($aux[0] == "nfs" && strpos($endpoint,":8787") === false) {
                    $sw .= urldecode("nfs") . " ";
        } else {
                    $sw .= urldecode($aux[0]) . " ";
        }
            }
        }

        $nodes = explode('=', end($stringSpliteado));
        $nodes = $nodes[1];
        
        //$auth_file = generate_auth_file_fedcloud($proxy, $endpoint, $myproxyserver, $myproxyuser, $myproxypass);
        $auth_file = generate_auth_file_fedcloud($endpoint);
        
        if($vmi != ''){
            //$data = generate_system_image_radl($provider, $vmi, $endpoint, '', '', $front_type, $wn_type, '', '', '', '', $nodes, translate_os($os));
           $data = generate_system_image_radl($provider, $vmi, $endpointName, '', '', $front_type, $wn_type, '', '', '', '', $nodes);
        } else{
            $data = generate_system_template_radl($provider, translate_os($os), $front_type, $wn_type, '', '', '', '', $nodes);
        }
        $os = $data[0];
        $user = $data[1];
        $pass = $data[2];
    } else {
        echo 'Unknown provider';
        exit(1);
    }

    if($auth_file != ""){
        $rand = substr($auth_file, 10);
    } else {
        $rand = random_string(5);
    }
    $name = "cluster_" . $rand;
    $lrms = strtolower($lrms);
    $sw = strtolower($sw);
    
    // Modificamos el numero maximo de nodos del cluster
    /*$path_to_file = '/var/www/html/ec3/command/templates/'.$os.".radl";
    $file_contents = file_get_contents($path_to_file);
    $file_contents = preg_replace('~ec3_max_instances = [0-9]+~', "ec3_max_instances = " .$nodes, $file_contents); 
    file_put_contents($path_to_file,$file_contents);*/
    
    //Hay que hacer una llamada al comando EC3 de la forma: $ ./ec3 launch mycluster slurm clues2 ubuntu-vmrc -a auth.dat -u http://servproject.i3m.upv.es:8899
    //-q para que no muestre el gusano y -y para que no pregunte lo de la conexion segura
    // quitamos el -q para que muestre el error, si ocurre, en el log

    $ec3_log_file = "/tmp/ec3_log_".$rand;
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
        $log_content = file_get_contents($ec3_log_file);
        if(strpos($log_content, "running") && strpos($log_content, "IP:")){
        //if(strpos($log_content, "running"){
            $ip = substr($log_content, strrpos($log_content, "IP:") + 4);
            $cond = True;
        } elseif(!$process->status()){
            if(strpos($log_content, "Error") && strpos($log_content, "Attempt 1:")){
                echo "Found problems deploying your cluster " . $name. ": ". substr($log_content, strpos($log_content, "Attempt 1:") + 10);
            } else{
                echo "Unexpected problems deploying the cluster ". $name .". Check the introduced data and try again. If the error persists, please contact us.";
            }
            $ec3_del_file = "/tmp/ec3_del_".$name;
            $process_2 = new Process("./command/ec3 destroy --yes --force " . $name, $ec3_del_file);
            $process_2->start(); 
            exit(1);
        } else {
            sleep(5);
        }
    }
    
    if ($provider == 'ec2' || $provider == 'openstack' || $provider == 'fedcloud'){
        //Si ya esta running, podemos obtener la clave privada generada por el im para conectarnos al frontend
        $ec3_ssh_file = "/tmp/ec3_ssh_".$rand;
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
    }

    //Devolvemos los datos del front-end desplegado
    if ($provider == 'one'){
        echo "{\"ip\":\"$ip\",\"name\":\"$name\",\"username\":\"$user\",\"password\":\"$pass\"}";
    } else { //($provider == 'ec2') || (provider == 'openstack')
        //echo "{\"ip\":\"$ip\",\"name\":\"$name\",\"username\":\"$user\"}";
        echo "{\"ip\":\"$ip\",\"name\":\"$name\",\"username\":\"$user\",\"secretkey\":\"$secret_key\"}";
    }

    //echo "{}";
}else {
    echo "Found errors receiving POST data";
}
?>
