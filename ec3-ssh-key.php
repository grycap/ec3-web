<?php
include_once('process.php');

if (isset($_GET['clustername'])) {
 
    $clustername = $_GET['clustername'];
	
    //update the proxy
    if(!isset($_SESSION)) session_start();

    if (!isset($_SESSION["egi_user_sub"]) or $_SESSION["egi_user_sub"] == "") {
        header('Location:session_expired.html');
    } else {
        $user_sub = $_SESSION["egi_user_sub"];
        $user_name = $_SESSION["egi_user_name"];
    }
	
    $ec3_ssh_file = "/tmp/ec3_ssh_".$clustername;
	$process_ssh = new Process("./command/ec3 ssh " . $clustername . "  --show-only ", $ec3_ssh_file);
	$process_ssh->start();
    while($process_ssh->status()) {
        sleep(1);
    }

	//process output and read the temp file where private key is
	$ssh_response = file_get_contents($ec3_ssh_file);
	$path_to_key = substr($ssh_response, 7, 14);
	if($path_to_key != ""){
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="key.pem"');
        echo file_get_contents($path_to_key);
        unlink($ec3_ssh_file);
	} else {
		echo "Error getting secret key info. File not exists.";
		exit(1);
	}
} else {
    echo "No clustername specified";
    exit(1);
}
		
?>
