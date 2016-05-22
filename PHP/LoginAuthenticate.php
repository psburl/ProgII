<?php
	
	if(file_exists("SqlQuery.php"))
		include("SqlQuery.php");

	$email = $_POST['lgEmail'];
	$password = $_POST['lgPassword'];

	$Result = SqlExec("select * from users where email = '$email' and password = '".md5($password)."'");

	$Result =  pg_fetch_array($Result);

	if($email == "" || $password == "" || !$Result[0]){

		echo "o usuário não existe";

	}
	else{

		session_start( );

		$_SESSION['Result'] = $Result;
		$_SESSION['email'] = $email;

		header( "location: ../start.php");
	}