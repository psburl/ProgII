<?php

	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

    session_start();

	$title = $_POST['taskTitle'];
	$description = $_POST['taskDescription'];
	$date = $_POST['data'];
	$owner = $_SESSION['email'];
	$place = $_POST['taskLocal'];


	$Query = "INSERT INTO tasks (title, description, date, owner, place)".
			"VALUES ('$title', '$description', '".date('m-d-Y', strtotime($date))."', '$owner', '$place')";

	SqlExec($Query);

	header( "location: ../start.php");
?>