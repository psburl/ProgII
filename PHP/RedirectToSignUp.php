<?php

	session_start();
	
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['passwordConf'] = $_POST['passwordConf'];


    header("Location: /../SignUp.html");


    $_PUT['name'] = "oi";
