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
}

if (!isset($_GET['cluster'])) {
    echo 'Cluster name not provided.';
    die();
}

$cluster_name = $_GET['cluster'];
$name = $cluster_name . "__" . $user_sub;

// llamamos a EC3 para listar los clusters
$ec3_log_file = "/tmp/ec3_ctxt_log_".random_string(5);
$process_2 = new Process("./command/ec3 show -r --json  " . $name, $ec3_log_file);

$pid = $process_2->start();

while($process_2->status()) {
    sleep(1);
}

$log_content = file_get_contents($ec3_log_file);

# delete the log file
unlink($ec3_log_file);

$ctxt_log = "Error parsing cluster data.";
$data = json_decode($log_content, true);
foreach ($data as $elem) {
    if ($elem["class"] == "system" && $elem["id"] == "front") {
        $ctxt_log = $elem["contextualization_output"];
    }
}

header('Content-type: text/plain');
echo $ctxt_log;
?>