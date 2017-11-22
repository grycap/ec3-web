<?php
	function cmp($a, $b)
	{
		if (strlen($a) == strlen($b)) {
			return strcmp($a, $b);
		}
		return (strlen($a) < strlen($b)) ? -1 : 1;
	}

    $return_string = "";
    $return_string .= "<select name=\"front-fedcloud\" id=\"front-fedcloud\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

	if(isset($_POST['endpointfedcloud']) and isset($_POST['vofedcloud']))
	{
		$selectOption = $_POST['endpointfedcloud']; 
        $vo = $_POST['vofedcloud']; 
		exec('python EGI_AppDB.py instances ' . $selectOption . " " . $vo, $instances);
		usort($instances, "cmp");
		foreach ($instances as $instance) {
                                list($inst_desc, $inst_name) = explode(";", $instance);
                                $return_string .= "<option value=\"" . $inst_name . "\">" . $inst_desc . "</option>";
		}
	}
    $return_string .= "</select>";
    echo $return_string;
?>
