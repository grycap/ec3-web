<?php
include_once('process.php');

if (isset($_GET['clustername'])) {
 
    $clustername = $_GET['clustername'];
	
	//Actualizamos el proxy
    if ( !session_id() ) {
        session_start();
    }

    if (!isset($_SESSION["egi_user_sub"]) or $_SESSION["egi_user_sub"] == "") {
        include('auth.php');
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

	//Ahora procesamos la salida y leemos el fichero temporal donde se guarda la clave privada
	$ssh_response = file_get_contents($ec3_ssh_file);
	$path_to_key = substr($ssh_response, 7, 14);
	if($path_to_key != ""){
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="key.pem"');
		echo file_get_contents($path_to_key);
	} else {
		echo "Error getting secret key info. File not exists.";
		exit(1);
	}
	
    //Devolvemos los datos del front-end desplegado
} else {
echo "No clustername specified";
exit(1);
}
		
?>
