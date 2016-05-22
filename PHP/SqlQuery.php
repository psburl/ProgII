<?php 
	function SqlExec($Query){

		if(file_exists("DB_Connect.php"))
			include("DB_Connect.php");
		
		else if(file_exists("PHP/DB_Connect.php"))
			include("PHP/DB_Connect.php");

		else{

			$errorMsg = "<center>".
							"<font color='#FF0000'><br>".
								"Não foi possível conectar ao banco de Dados<br>".
		   						"O arquivo 'DB_Connect' não foi encontrado.".
		    				"</font>".
		    			"</center>";

		    echo $errorMsg;
		    exit;
		}

		$Result = pg_query($DB_Connect,$Query);
        pg_close($DB_Connect);
        
        return $Result;
	}
?>
