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
    
    $auth_file = "/tmp/auth_" .$clustername;

    if(!isset($_SESSION)) session_start();

    if (!isset($_SESSION["egi_user_sub"])) {
        //echo "Error no EGI AAI user ID obtained.";
        header('Location:session_expired.html');
        die("");
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

    if ($provider == 'openstack'){
        if($access_token!=""){
            //recover credentials for IM
            $im_line="";

            if (file_exists($auth_file)){
                //read old credentials file
                $file = fopen($auth_file, "r") or exit("Unable to find the old auth file:" . $auth_file . ". Is the cluster name correct?");
                while(!feof($file)){
                    $line = fgets($file);
                    if(strstr($line, "id = egi")){
                        $fedcloud_line = $line;
                        $ini = strpos($fedcloud_line, "host = ") + 7;
                        $length = strpos($fedcloud_line, ";", $ini) - $ini;
                        $endpoint = substr($fedcloud_line, $ini, $length);
                    }
                    if(strstr($line, "InfrastructureManager")){
                        $im_line=$line;
                    }
                }
                fclose($file);
            } else {
                //if the $auth_file does not exist, we can get the IM info from "/var/www/html/.ec3/clusters/" . $clustername
                //en el system front/auth buscar la linea de "type": "InfrastructureManager" y esa es la que tenemos que guardar en $im_line
                 $im_username = "";
                 $im_pass = "";
                 $endpoint = "";
                 $file = fopen("/var/www/.ec3synergy/clusters/" . $clustername, "r") or exit("Unable to find the cluster data for cluster:" . $clustername . ". Is the cluster name correct?");
                 $logs = fopen("/tmp/amcaar_logs.txt", "w");
                 while(!feof($file)){
                    $line = fgets($file);
                    if(strstr($line, "auth")){
                        //take auth values for IM, the info is in JSON format
                        $auth_data_json = substr($line, strpos($line, "auth = ")+8, strpos($line, "' and") - (strpos($line, "auth = ")+8));
                        $json_decoded = json_decode($auth_data_json);
                        fwrite($logs, $auth_data_json);
                        //access  username and password of IM and save it
                        for ($i = 0; $i < count($json_decoded); $i++) {
                            if ($json_decoded[$i]->{'type'} == "InfrastructureManager") {
                                $im_username = $json_decoded[$i]->{'username'};
                                $im_pass = $json_decoded[$i]->{'password'};
                            }
                            if ($json_decoded[$i]->{'type'} == "OpenStack") {
                                $endpoint = $json_decoded[$i]->{'host'};
                            }
                        }
                        $im_line="type = InfrastructureManager; username = " . $im_username . "; password = " . $im_pass;
                    }
             }
                 fclose($file);
                 fclose($logs);
             }

            $api_version = "2.0";
            $tenant = "openid";
            $domain = "eosc-synergy.eu";
            if (strpos($endpoint, "ifca.es")) {
                $domain = "VO:eosc-synergy.eu";
            }
            if (strpos($endpoint, "keystone3.ui.savba.sk")) {
                $api_version = "1.1";
            }
            
            //Write new auth file
            $gestor = fopen($auth_file, "w");
            fwrite($gestor, "id = egi; type = OpenStack; host = " . $endpoint . "; username = egi.eu; auth_version = 3.x_oidc_access_token; password = " . $access_token . "; tenant = " . $tenant . "; domain = " . $domain . "; api_version = " . $api_version . PHP_EOL);
            fwrite($gestor, $im_line. PHP_EOL);
            fclose($gestor);
        } else {
            exit("Error refreshing the token.");
        }
    }

    // Call EC3 to delete the cluster
    $ec3_log_file = "/tmp/ec3_del_". $clustername;
    if($auth_file != ""){
        $process_2 = new Process("./command/ec3 destroy --yes --force -a " . $auth_file. " " . $clustername, $ec3_log_file);
    } else {
        $process_2 = new Process("./command/ec3 destroy --yes --force " . $clustername, $ec3_log_file);
    }
    $pid = $process_2->start();
    // check if the cluster has been properly deleted
    $status = False;
    while($process_2->status()) {
        sleep(1);
    }

    $log_content = file_get_contents($ec3_log_file);

    if(strpos($log_content, "Error") === False){
        $status = True;
    }
    
    if($status){
	// wait a bit to delete cluster files
        sleep(10);
        if (file_exists('/var/www/.ec3synergy/clusters/'. $clustername)) {
            unlink('/var/www/.ec3synergy/clusters/'. $clustername);
        }
        echo "{}";
    } else {
        echo "Problems deleting the cluster. Try again or contact us if the error persists.";
    }

    // delete log files
    unlink($ec3_log_file);
    if($auth_file != ""){
        unlink($auth_file);
    }

}else {
    echo "Found errors receiving POST data";
}
?>
