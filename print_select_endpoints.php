<?php
    $return_string = "";
    //$return_string .= "<select name=\"endpoint-fedcloud\" id=\"endpoint-fedcloud\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

	if(isset($_POST['vofedcloud']))
	{
		$selectOption = $_POST['vofedcloud']; 
        exec('python EGI_AppDB.py sites ' . $selectOption, $sites);
        foreach ($sites as $site) {
            $site_p = explode(";", $site);
			$return_string .= "<option value=\"" . $site_p[1] . "\">" . $site_p[0] . "</option>";
        }
	}
	
    //$return_string .= "</select>";
    echo $return_string;
?>
