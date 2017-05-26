<?php
	// GETS JSON VALUES
	$fileurl = "http://osferreiras.com.br/data/pepperData.json";
	$json = json_decode(file_get_contents($fileurl), true);

	$json["value1"] = 0;
	$json["value2"] = 0;
	$json["value3"] = 0;
	$json["value4"] = 0;

	// ADDS VALUE BACK TO JSON
	file_put_contents("/home/criscmai/public_html/osferreiras.com.br/data/pepperData.json",json_encode($json)) or print_r(error_get_last());
	
	echo 'Values reseted to 0. Click <a href="/pepper.php">here to go back</a>';

?>