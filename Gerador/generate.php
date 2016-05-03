<html lang = "en-us">

	<head>
		<title>Invitation Generator</title>
		<link rel="stylesheet" type="text/css" href="InvitationGenerator.css">
		<meta charset = "utf-8">
	</head>

<?php

	$eventName = $_POST['name'];
	$eventPlace = $_POST['place'];
	$eventHour = $_POST['hour'];
	$guest = $_POST['guest'];


	if(isset($_POST['img'])){

		if($_POST['img']== "1")
			$imgaddress = "img/back1.png";

		else if($_POST['img']== "2")
			$imgaddress = "img/back2.jpg";

		else if($_POST['img']== "3")
			$imgaddress = "img/back3.jpg";
	}
	else
		header("Location: InvitationGenerator.htm");
	


	if(isset($_POST['image'])){

		if($_POST['image']== "1"){
			$image = "img/baloon.png";
			$idImage = "imBaloon";
		}

		else if($_POST['image']== "2"){
			$image = "img/form.png";
			$idImage = "imForm";
		}
	}
	else 
		header("Location: InvitationGenerator.htm");
	

	if(isset($_POST['position'])){

		if($_POST['position']== "1")
			$position = "right";
		
		else if($_POST['position']== "2")
			$position = "left";
	}
	else
		header("Location: InvitationGenerator.htm");
	

	if(isset($_POST['sex'])){

		if($_POST['sex']== "m")
			$sex = "convidado";
		
		else if($_POST['sex']== "f")
			$sex = "convidada";
	}
	else
		header("Location: InvitationGenerator.htm");
	

	$npos = ($position == "right") ? "left" : "right";

	echo 
		"<div id = \"background\" style=\"background-image: url(".$imgaddress.");\">".
			"<img id = \"".$idImage."\" src = \"".$image."\" style=\"float:". $position ."; \">".
			"<div  style=\"float:". $npos .";\" id = \"text\">".
				"<article>".
					$eventName."<br><br>".
					"Olá, ".$guest."<br>".
					"informo que você está mais que <br>".$sex."<br>".
					" para o evento: ". $eventName."<br>".
					"Local: ".$eventPlace."<br>".
					"Horário: ".$eventHour."<br>".
				"</article>".
			"</div>".
		"</div>";


