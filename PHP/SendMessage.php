<?php
	
	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

	session_start();

	$from = $_SESSION['email'];
	$to = $_POST['btnSendMessageTo'];
	$message = $_POST['btnSendMessageBody'];

	if($from != "" && $to != "" && $message !=""){

		$Query = "INSERT INTO sendmessages(messagefrom,messageto,messagebody)".
				"VALUES ('$from', '$to', '$message')";

		 SqlExec($Query);
	}

	header( "location: ../start.php");
?>