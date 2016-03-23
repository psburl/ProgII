<?php 
	function SqlExec($Query){
		if(file_exists("DB_Connect.php")){
			include("DB_Connect.php");

		
		}
		else{
			$errorMsg = "<center><font color='#FF0000'><b>";
			$errorMsg.= "Não foi possível conectar ao banco de Dados<br>";
		   	$errorMsg.=	"O arquivo 'DB_Connect' não foi encontrado.";
		    $errorMsg.=	"</b></font></center>";
		    echo "<br><br>";
		    echo $errorMsg;
		    exit;
		}

		$Result = pg_query($DB_Connect,$Query);
        pg_close($DB_Connect);
        return $Result;
	}
?>