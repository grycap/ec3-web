<?php
	function cmp($a, $b)
	{
		list($inst_desc_a, $inst_name_a) = explode(";", $a);
		list($inst_desc_b, $inst_name_b) = explode(";", $b);
		if (strlen($inst_desc_a) == strlen($inst_desc_b)) {
			return strcmp($inst_desc_a, $inst_desc_b);
		}
		return (strlen($inst_desc_a) < strlen($inst_desc_b)) ? -100 : 100;
	}

    $return_string = "";
    $return_string .= "<select name=\"front-fedcloud\" id=\"front-fedcloud\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

	if(isset($_POST['endpointfedcloud']))
	{
		$selectOption = $_POST['endpointfedcloud']; 
                if (strpos($selectOption, ' (CRITICAL state!)')) {
                    $selectOption = str_replace(' (CRITICAL state!)', '',$selectOption);
                }
		exec('python EGI_AppDB.py ' . $selectOption . ' instances', $instances);
		usort($instances, "cmp");
		foreach ($instances as $instance) {
				/*ahora inst_desc es la CPU y inst_name es la RAM */
				list($inst_desc, $inst_name) = explode(";", $instance);
				$return_string .= "<option value=\"" . $instance . "\">" . $inst_desc . " CPUs - " . $inst_name . " RAM" . "</option>";
		}
	}
    $return_string .= "</select>";
    echo $return_string;
?>
