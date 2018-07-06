<?php

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

// Generates the auth file for Fogbow deployments
function generate_auth_file_fogbow($endpoint, $token, $clustername) {
    //$auth = '';
    //$auth = tempnam("/tmp", "auth_");
    $auth = "/tmp/auth_" . $clustername;
    chmod($auth, 0644);

    //Write user credentials in IM format, like: 
    //id = fogbow; type = FogBow; host = 150.165.85.52:8182; token = eyJsb2duaW4iOiJ1cHZ
    
    $gestor = fopen($auth, "w");
    fwrite($gestor, "id = fogbow; type = FogBow; host = " . "$endpoint . "; token = " . $token . PHP_EOL);
    //Write needed credentials of IM and VMRC
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    //fwrite($gestor, "type = VMRC; host = http://servproject.i3m.upv.es:8080/vmrc/vmrc; username = micafer; password = ttt25");
    fclose($gestor);

    //to delete an empty file that tempnam creates
    //unlink($auth);
    return $auth;
}


// Generates the system RADL file for the deployments that the user has indicated an AMI or VMI
function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes){
    $rand_str = random_string(4); 
    $templates_path = (isset($GLOBALS['templates_path']) ? $GLOBALS['templates_path'] : "/var/www/html/ec3-ltos/command/templates");
    $path_to_new_file = $templates_path . '/system_'.$rand_str.'.radl';
    $file_name = 'system_'.$rand_str;
    
    // Obtenemos user y pass random
    $fcuser = 'cloudadm';
    $pass = random_string(3).'#'. random_string(3).'5A';

    $new_file = fopen($path_to_new_file, "w");
    fwrite($new_file, "system front (".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);

    //fwrite($new_file, "    disk.0.image.url = '".$region. "/" .$ami. "' and".PHP_EOL);
    fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?vo.access.egi.eu' and".PHP_EOL);
    fwrite($new_file, "    instance_type='".$instancetype_front."' and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."' and".PHP_EOL);
    //fwrite($new_file, "    ec3aas.username = '".$user_sub."'".PHP_EOL);
    
    fwrite($new_file, ")".PHP_EOL);
    fwrite($new_file, PHP_EOL);

    fwrite($new_file, "system wn (".PHP_EOL);
    fwrite($new_file, "    ec3_max_instances = ".$nodes." and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);

    fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?vo.access.egi.eu' and".PHP_EOL);
    //fwrite($new_file, "    disk.0.image.url = '".$region. "/" .$ami. "' and".PHP_EOL);
    fwrite($new_file, "    instance_type='".$instancetype_wn."' and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."'".PHP_EOL);

    fwrite($new_file, ")".PHP_EOL);
    
    fclose($new_file);
    
    return array($file_name, $fcuser, $pass);
}

// Generates the system RADL file for the deployments that the user DOES NOT has indicated an AMI or VMI
function generate_system_template_radl($cloud, $os, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes, $user_id){
    $rand_str = random_string(4);
    $templates_path = (isset($GLOBALS['templates_path']) ? $GLOBALS['templates_path'] : "/var/www/html/ec3/command/templates");
    $path_to_new_file = $templates_path . '/'.$os.'-'.$cloud.'_'.$rand_str.'.radl';
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
    
    $file_contents = file_get_contents($path_to_new_file);
    $file_contents = str_replace("#INSTANCES#",$nodes,$file_contents);
    $file_contents = str_replace("#CPU_FRONT#",$front_cpu,$file_contents);
    $file_contents = str_replace("#MEM_FRONT#",$front_mem."m",$file_contents);
    $file_contents = str_replace("#USERID#",$user_id,$file_contents);
    $file_contents = str_replace("#CPU_WN#",$wn_cpu,$file_contents);
    $file_contents = str_replace("#MEM_WN#",$wn_mem."m",$file_contents);
    file_put_contents($path_to_new_file,$file_contents);

    return array($file_name);
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
        case "Ubuntu 16.04":
            $os = "ubuntu16";
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

           
if($_POST){
    $possible_sw = array("nfs", "maui", "openvpn", "octave", "docker", "gnuplot", "tomcat", "galaxy", "marathon", "chronos", "hadoop", "namd", "extra_hd");    

    // El string recibido tiene este aspecto: cloud=fogbow&accesskey=ffffff&secretkey=hhhhhhhhh&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=5
    // Pero tenemos que devolver un JSON si todo ha ido bien
    //json_encode($stringSpliteado);

    $provider = (isset($_POST['cloud']) ? $_POST['cloud'] : "unknown");
    
    if ($provider == 'fogbow'){
        $endpointName = (isset($_POST['endpoint-fogbow']) ? $_POST['endpoint-fogbow'] : "");
        $token = (isset($_POST['token-fogbow']) ? $_POST['token-fogbow'] : "");
        $user_id = hash('md5', $token);
        $os = (isset($_POST['os-fogbow']) ? $_POST['os-fogbow'] : "");

        if($os == ''){
            echo 'Image SO not provided. Impossible to launch a cluster without these data. Please, enter the required information and try again.';
            exit(1);
        }

        $front_cpu = (isset($_POST['front-cpu-fogbow']) ? $_POST['front-cpu-fogbow'] : "");
        $front_mem = (isset($_POST['front-mem-fogbow']) ? $_POST['front-mem-fogbow'] : "");
        $wn_cpu = (isset($_POST['wn-cpu-fogbow']) ? $_POST['wn-cpu-fogbow'] : "");
        $wn_mem = (isset($_POST['wn-mem-fogbow']) ? $_POST['wn-mem-fogbow'] : "");

        $lrms = (isset($_POST['lrms-fogbow']) ? $_POST['lrms-fogbow'] : "");
        
        if($lrms == '' ){
            echo 'LRMS not provided. Impossible to launch a cluster without this data. Please, enter the required information and try again.';
            exit(1);
        }
        
        $sw = "clues2 ";
        foreach ($possible_sw as $item_sw) {
            if (isset($_POST[$item_sw])) {
                $sw .= $item_sw . " ";
            }
        }

        $nodes = (isset($_POST['nodes-fogbow']) ? $_POST['nodes-fogbow'] : "1");
        
        $cluster_name = (isset($_POST['cluster-name']) ? $_POST['cluster-name'] : "");
        //TODO: ver si implementamos un sistema de autenticacion de usuarios, de momento usamos el token
        $name = $cluster_name . "__" . $user_id;
        $lrms = strtolower($lrms);
        $sw = strtolower($sw);


        $auth_file = generate_auth_file_fogbow($endpoint, $token, $name);
        //TODO: adaptarlo a fogbow, porque tendremos que tener predefinidos los OS que soporta y por tanto solo modificar las recetas
        $data = generate_system_template_radl($provider, translate_os($os), '', '', $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes,$user_id);
        //$data = generate_system_image_radl($provider, $vmi, $endpointName, '', '', $front_type, $wn_type, '', '', '', '', $nodes);
        $os = $data[0];
        $user = "fogbow";
        
    } else {
        echo 'Unknown provider';
        exit(1);
    }
    
    //Hay que hacer una llamada al comando EC3 de la forma: $ ./ec3 launch mycluster slurm clues2 ubuntu-vmrc -a auth.dat -u http://servproject.i3m.upv.es:8899
    //-q para que no muestre el gusano y -y para que no pregunte lo de la conexion segura
    // quitamos el -q para que muestre el error, si ocurre, en el log

    $ec3_log_file = "/tmp/ec3_log_".$name;
    $process = new Process("./command/ec3 launch -y " . $name . " " . $lrms . " " . $sw . $os . " -a " . $auth_file, $ec3_log_file);
    $process->start();
    
    // Recuperamos la salida del comando ec3 (con el fichero que guarda en /tmp)
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

    //Si ya esta running, podemos obtener la clave privada generada por el IM para conectarnos al frontend
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
