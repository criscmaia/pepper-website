<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta name="msapplication-TileColor" content="#f05a22">
	<meta name="theme-color" content="#404041">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	
	<meta name="description" content="Pepper App">
	<meta name="author" content="Cristiano Maia">
	<title>Pepper App</title>

	<link href='https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<style>
		* {
			font-family: "Roboto", sans-serif;
			margin: 0;
			padding: 0;
		}
		body {
			background-color: #FFF !important;
			color: #333;
		}
		.body-container {
			display: -webkit-box;
			display: -moz-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-flex-direction: column;
			-ms-flexbox-direction: column;
			-ms-flex-direction: column;
			flex-direction: column;
			-webkit-box-align-content: center;
			-webkit-align-content: center;
			-ms-flex-align-content: center;
			align-content: center;
			width: 100vw;
			height: 100vh;
		}
		.content {
			flex-grow: 2;
			width: 100%;
			align-self: center;
			text-align: center;
		}
		.content h1 {
			font-weight: 300;
			font-size: 3.5em;
		}
		.content h2 {
			font-weight: 200;
			font-size: 3em;
			margin: 80px 0 30px 0;
		}
		.content a {
			font-weight: 200;
			font-size: 2em;
		}
		.btn {
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 24px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			width: 100%;
			text-transform: uppercase;
			height: 23vh;
		}
		.btn.disabled,
		.btn[disabled],
		fieldset[disabled] .btn {
			cursor: not-allowed;
			filter: alpha(opacity=65);
			-webkit-box-shadow: none;
			box-shadow: none;
			opacity: .65;
			background-color: pink;
		}
		.btn-default {
			color: #333;
			background-color: #fff;
			border-color: #ccc;
		}
		.btn-success {
			color: #fff;
			background-color: #5cb85c;
			border-color: #4cae4c;
		}
	</style>
</head>

<body>
	<main class="body-container">
		<div class="content">
			<?php
				// GETS JSON VALUES
				$fileurl = "http://osferreiras.com.br/data/pepperData.json";
				$json = json_decode(file_get_contents($fileurl), true);

				// CHECK IF VALUES NEED TO BE UPDATED
				if(isset($_GET['value1']) && !empty($_GET['value1'])){
					$json["value1"] = $_GET['value1'];
				}
				if(isset($_GET['value2']) && !empty($_GET['value2'])){
					$json["value2"] = $_GET['value2'];
				}
				if(isset($_GET['value3']) && !empty($_GET['value3'])){
					$json["value3"] = $_GET['value3'];
				}
				if(isset($_GET['value4']) && !empty($_GET['value4'])){
					$json["value4"] = $_GET['value4'];
				}

				// ADDS VALUE BACK TO JSON
				file_put_contents("/home/criscmai/public_html/osferreiras.com.br/data/pepperData.json",json_encode($json)) or print_r(error_get_last());

				// DISPLAY BUTTONS
				foreach ($json as $key => $value) {    
					if ($value==0) {
						echo "<button  class=\"btn btn-success\" onclick=\"location.href='http://osferreiras.com.br/pepper.php?".$key."=1'\" type=\"button\">Turn on ".$key."</button>";
					} else {
						echo "<button class=\"btn btn-default\" disabled onclick=\"location.href='http://osferreiras.com.br/pepper.php?value".$key."=1'\" type=\"button\">".$key." IS ON</button>";
					}
				}
			?>
		</div>
	</main>
</body>

</html>