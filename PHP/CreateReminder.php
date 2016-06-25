<?php

	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

    session_start();

	$description = $_POST['taskDescription'];
	$owner = $_SESSION['email'];


	$Query = "INSERT INTO reminders (description, owner) ".
			"VALUES ('$description', '$owner')";

	SqlExec($Query);

	header( "location: ../start.php");
?>