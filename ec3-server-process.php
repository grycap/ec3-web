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

// Generates the auth file for FedCloud deployments
//function generate_auth_file_fedcloud($proxy, $endpoint, $myproxyserver, $myproxyuser, $myproxypass) {
function generate_auth_file_fedcloud($endpoint, $clustername) {
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
    
    if (!isset($_SESSION["egi_access_token"])) {
        //echo "Error no unity user ID obtained.";
        header('Location:session_expired.html');
        die();
    } else {
        $access_token = $_SESSION["egi_access_token"];
    }

 
    $gestor = fopen($auth, "w");
#    fwrite($gestor, "id = occi; type = OCCI; proxy = " . $proxy . "; host = " . $endpoint . PHP_EOL);

    $api_version = "2.0";
    $tenant = "openid";
    $domain = "eosc-synergy.eu";
    if (strpos($endpoint, "ifca.es")) {
        $domain = "VO:eosc-synergy.eu";
    }
    if (strpos($endpoint, "keystone3.ui.savba.sk")) {
        $api_version = "1.1";
    }

    fwrite($gestor, "id = egi; type = OpenStack; host = " . $endpoint . "; username = egi.eu; auth_version = 3.x_oidc_access_token; password = " . $access_token . "; tenant = " . $tenant . "; domain = " . $domain . "; api_version = " . $api_version . PHP_EOL);
    //Write needed credentials for IM 
    fwrite($gestor, "type = InfrastructureManager; username = " . random_string(8) . "; password = " . random_string(10). PHP_EOL);
    fclose($gestor);

    return $auth;
}


// Generates the system RADL file for the deployments that the user has indicated an AMI or VMI
//function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes, $os) {
function generate_system_image_radl($cloud, $ami, $region, $ami_user, $ami_password, $instancetype_front, $instancetype_wn, $front_cpu, $front_mem, $wn_cpu, $wn_mem, $nodes, $kubeToken){
    $rand_str = random_string(4); 
    $templates_path = (isset($GLOBALS['templates_path']) ? $GLOBALS['templates_path'] : "/var/www/html/ec3-synergy/command/templates");
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

    //DIVIDE CPU-MEM FROM $instancetype_front
    $front_details = explode(";", $instancetype_front);

    //DIVIDE CPU-MEM FROM $instancetype_wn
    $wn_details = explode(";", $instancetype_wn);
    
    if ($region == "IFCA-LCG2") {
        fwrite($new_file, "    disk.0.image.url = 'ost://api.cloud.ifca.es/" .$ami. "' and".PHP_EOL);
    } else {
        fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?eosc-synergy.eu' and".PHP_EOL);
    }
    fwrite($new_file, "    cpu.count>=".$front_details[0]." and".PHP_EOL);
    fwrite($new_file, "    memory.size>=".$front_details[1]."m and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."' and".PHP_EOL);
    
    if ($kubeToken != ''){
        fwrite($new_file, "    kube_token='".$kubeToken."' and".PHP_EOL);
    }
    
    fwrite($new_file, "    ec3aas.username = '".$user_sub."'".PHP_EOL);
    
    fwrite($new_file, ")".PHP_EOL);
    fwrite($new_file, PHP_EOL);

    // SYSTEM WN
    fwrite($new_file, "system wn (".PHP_EOL);
    fwrite($new_file, "    ec3_max_instances = ".$nodes." and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.name='linux' and".PHP_EOL);

    //Depende del cloud el formato de URL cambia:
    if ($region == "IFCA-LCG2") {
        fwrite($new_file, "    disk.0.image.url = 'ost://api.cloud.ifca.es/" .$ami. "' and".PHP_EOL);
    } else {
        fwrite($new_file, "    disk.0.image.url = 'appdb://".$region. "/" .$ami. "?eosc-synergy.eu' and".PHP_EOL);
    }
    fwrite($new_file, "    cpu.count>=".$wn_details[0]." and".PHP_EOL);
    fwrite($new_file, "    memory.size>=".$wn_details[1]."m and".PHP_EOL);
    fwrite($new_file, "    disk.0.os.credentials.username = '".$fcuser."'".PHP_EOL);
    fwrite($new_file, ")".PHP_EOL);
    
    fclose($new_file);
    
    return array($file_name, $fcuser, $pass);
}


if($_POST){
    $possible_sw = array("octave", "gnuplot", "galaxy", "namd", "extra_hd", "spark");    

    // El string recibido tiene este aspecto: cloud=ec2&accesskey=ffffff&secretkey=hhhhhhhhh&os-ec2=Ubuntu+12.04&lrms-ec2=SLURM&clues=clues&nodes-ec2=5
    // Pero tenemos que devolver un JSON si todo ha ido bien
    //json_encode($stringSpliteado);

    $provider = (isset($_POST['cloud']) ? $_POST['cloud'] : "unknown");
    
    if ($provider == 'fedcloud'){
        $endpointName = (isset($_POST['endpointName']) ? $_POST['endpointName'] : "");
        $endpointName = str_replace(' (CRITICAL state!)', '',$endpointName);
        $endpoint = (isset($_POST['endpoint-fedcloud']) ? $_POST['endpoint-fedcloud'] : "");
        $vmi = (isset($_POST['vmi-fedcloud']) ? $_POST['vmi-fedcloud'] : "");

        if($vmi == ''){
            /*VMI ahora es el ID de la imagen */
            echo 'Image ID not provided. Impossible to launch a cluster without these data. Please, enter the required information and try again.';
            exit(1);
        }

        /* front y wn type ahora es la cantidad de cpu y ram */
        $front_type = (isset($_POST['front-fedcloud']) ? $_POST['front-fedcloud'] : "");
        $wn_type = (isset($_POST['wn-fedcloud']) ? $_POST['wn-fedcloud'] : "");

        $lrms = (isset($_POST['lrms-fedcloud']) ? $_POST['lrms-fedcloud'] : "");
        $kubeToken = "";
        
        if ($lrms == '' ){
            echo 'LRMS not provided. Impossible to launch a cluster without this data. Please, enter the required information and try again.';
            exit(1);
        } else if ($lrms == 'kubernetes' ){
            $kubeToken = (isset($_POST['kube_token']) ? $_POST['kube_token'] : "");
        }
        
        $sw = "clues2 refreshtoken ";
        foreach ($possible_sw as $item_sw) {
            if (isset($_POST[$item_sw])) {
                $sw .= $item_sw . " ";
            }
        }
        
        //Add NFS to Slurm, Torque and SGE clusters
        if ($lrms == 'slurm' or $lrms == 'torque' or $lrms == 'sge'){
            $sw .= 'nfs' . " ";
        }
        
        //Add Chronos and Marathon to Mesos clusters
        if ($lrms == 'mesos'){
            $sw .= 'chronos marathon' . " ";
        }

        $nodes = (isset($_POST['nodes-fedcloud']) ? $_POST['nodes-fedcloud'] : "1");
        
        $cluster_name = (isset($_POST['cluster-name']) ? $_POST['cluster-name'] : "");
        if (strpos($cluster_name, ' ')){
            $cluster_name = str_replace(' ', '_', $cluster_name);
        }
        
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

        $data = generate_system_image_radl($provider, $vmi, $endpointName, '', '', $front_type, $wn_type, '', '', '', '', $nodes, $kubeToken);

        $os = $data[0];
        $user = $data[1];
        $pass = $data[2];
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
    /* El contenido del fichero tiene la forma:
        1047
        Front-end state: pending, IP: 158.42.105.207Front-end state: running, IP: 158.42.105.207
    */

    $ip = " ";
    $cond = False;
    while(!$cond){
        sleep(5);
        $log_content = file_get_contents($ec3_log_file);
        if(strpos($log_content, "running") && preg_match('/IP: [0-9]/', $log_content)){
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
            unlink($ec3_del_file);
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

    // Return data of the new cluster
    echo "{\"ip\":\"$ip\",\"name\":\"$cluster_name\",\"username\":\"$user\",\"secretkey\":\"$secret_key\"}";
    
    // Delete log files from server
    unlink($ec3_ssh_file);
    unlink($ec3_log_file);

}else {
    echo "Found errors receiving POST data";
}
?>
