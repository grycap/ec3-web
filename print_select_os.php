<?php
    $return_string = "";
    $return_string .= "<select name=\"vmi-fedcloud\" id=\"vmi-fedcloud\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

	if(isset($_POST['endpointfedcloud']) and isset($_POST['vofedcloud']))
	{
		$selectOption = $_POST['endpointfedcloud']; 
        $vo = $_POST['vofedcloud']; 
		exec('python EGI_AppDB.py os ' . escapeshellarg($selectOption) . " " . $vo, $oss);
		foreach ($oss as $os) {
			$aux = explode(";", $os);
			$name = $aux[0];
			$os = $aux[1];
			# Quitamos Chipster y DCI-Bridge
			if ($name != "Chipster" &&  $name != "DCI-Bridge") {
				$return_string .= "<option value=\"" . $os . "\">" . $name . "</option>";
			}
		}
	}
    $return_string .= "</select>";
    echo $return_string;
?>
