<?php
    $return_string = "";
    $return_string .= "<select name=\"vmi-fedcloud\" id=\"vmi-fedcloud\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

	if(isset($_POST['endpointfedcloud']))
	{
		$selectOption = $_POST['endpointfedcloud']; 
                if (strpos($selectOption, ' (CRITICAL state!)')) {
                    $selectOption = str_replace(' (CRITICAL state!)', '',$selectOption);
				}
		if ($selectOption == "IFCA-LCG2") {
			$return_string .= "<option value=\"87d768ef-066e-453a-914a-facfb0e76a66\">CentOS 7</option>";
			$return_string .= "<option value=\"36370cf1-074d-49a3-b3db-4d2e21851e87\">Ubuntu 16.04</option>";
			$return_string .= "<option value=\"a9400860-0ae1-4021-a850-276db9989498\">Ubuntu 18.04</option>";
		} else {
			exec('python EGI_AppDB.py ' . $selectOption . ' os', $oss);
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
	}
    $return_string .= "</select>";
    echo $return_string;
?>
