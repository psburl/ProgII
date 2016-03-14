<?php 
	

	$DB_Connect = pg_connect("dbname = ItsMyLife port = 5432 host = localhost user = postgres password = psr-e323");

	if($DB_Connect){
		echo"foi";
	}else{
		pg_last_error($DB_Connect);
		echo"erro"
		exit;
	}
?> 