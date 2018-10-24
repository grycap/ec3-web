<?php

    $return_string = "";
    $return_string .= "<select name=\"fronthelix\" id=\"fronthelix\" data-placeholder=\"--Select one--\" style=\"width:350px;\" class=\"chzn-select form-control\" data-validate=\"drop_down_validation\"><option value=\"\"></option>";

    if($_POST)
    {
        $cloud = (isset($_POST['providerhelix']) ? $_POST['providerhelix'] : "");
        $cloud = strtolower($cloud);
        
        $apikey = (isset($_POST['user']) ? $_POST['user'] : "");
        $secretkey = (isset($_POST['pass']) ? $_POST['pass'] : "");
        
        $domain = (isset($_POST['domain']) ? $_POST['domain'] : "");
        $projectID = (isset($_POST['project']) ? $_POST['project'] : "");
        
        if ($cloud == 'exoscale'){
            exec('python EGI_HNSci.py ' . $cloud . ' flavors ' . $apikey . ' ' . $secretkey, $instances);
        } else{
            exec('python EGI_HNSci.py ' . $cloud . ' flavors ' . $apikey . ' ' . $secretkey . ' ' . $domain . ' ' . $projectID, $instances);
        }

		foreach ($instances as $instance) {
			$aux = explode(";", $instance);
			$name = $aux[0];
			$instance = $aux[1];
            $return_string .= "<option value=\"" . $name . "\">" . $instance . "</option>";
		}
	}
    $return_string .= "</select>";
    echo $return_string;
?>
