<?php
include_once('process.php');

//TODO: use clustername not a random string
// Generates a random string for the name of the cluster
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

    
//obtain UNITY user
if(!isset($_SESSION)) session_start();

if (!isset($_SESSION["egi_user_sub"]) or $_SESSION["egi_user_sub"] == "") {
    header('Location:session_expired.html');
    die();
} else {
    $user_sub = $_SESSION["egi_user_sub"];
    $user_name = $_SESSION["egi_user_name"];
}

// llamamos a EC3 para listar los clusters
$ec3_log_file = "/tmp/ec3_list_".random_string(5);
$process_2 = new Process("./command/ec3 list -r --json --username " . $user_sub, $ec3_log_file);

$pid = $process_2->start();
// Comprobamos si se ha listado correctamente
$status = False;

while($process_2->status()) {
    sleep(1);
}

$log_content = file_get_contents($ec3_log_file);
if(strpos($log_content, "Error") === False){
    $status = True;
}

if($status){
    echo $log_content;
} else{
    echo "Problems listing clusters.";
    exit(1);
}

?>
