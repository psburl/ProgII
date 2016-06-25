<?php


	if(file_exists("SqlQuery.php"))
       include("SqlQuery.php");

    session_start();
	
	$idTask = $_GET['id'];
	$usersAux = $_POST['txtAtr'];

	$users = explode(';',$usersAux);

	foreach($users as $user){
		
		$Query = "SELECT 1 FROM users WHERE email = '$user'";

		$Result = SqlExec($Query);

		$Result =  pg_fetch_array($Result);

		if($Result[0]){

			$Query = "SELECT 1 FROM taskshares WHERE useremail = '$user' AND idTask = '$idTask'";

			$Result = SqlExec($Query);

			$Result =  pg_fetch_array($Result);

			if(!$Result[0]){

				$Query = "INSERT INTO taskshares(useremail,idTask) VALUES ('$user','$idTask')";

				$Result = SqlExec($Query);

				$Result =  pg_fetch_array($Result);
			}
		}
	}


?>