<?php

	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

    session_start();

    $id = $_GET['id'];
	$Query = "DELETE from tasks where idtask = '$id'";

	SqlExec($Query);

	header( "location: ../start.php");
?>