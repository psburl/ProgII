<?php

	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

    session_start();

    $id = $_GET['id'];
    $type = $_GET['type'];	

    $Query = "";

    if($type == 0){
        $Query = "DELETE from taskShares WHERE idTask = '$id'";
        SqlExec($Query);

    	$Query = "DELETE from tasks where idtask = '$id'";
    }
    else if($type == 1)
    	$Query = "DELETE from reminders where idreminder = '$id'";

	SqlExec($Query);

	header( "location: ../start.php");
?>