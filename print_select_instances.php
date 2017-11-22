<?php
    $return_string = "";
    $return_string .= "<select name=\"front-fedcloud\" id=\"front-fedcloud\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

	if(isset($_POST['endpointfedcloud']))
	{
		$selectOption = $_POST['endpointfedcloud']; 
		exec('python EGI_AppDB.py ' . $selectOption . ' instances', $instances);
		asort($instances);
		foreach ($instances as $instance) {
				list($inst_desc, $inst_name) = explode(";", $instance);
				$return_string .= "<option value=\"" . $inst_name . "\">" . $inst_desc . "</option>";
		}
	}
    $return_string .= "</select>";
    echo $return_string;
?>
