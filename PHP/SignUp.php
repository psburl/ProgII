<?php 

    if(file_exists("SqlQuery.php")){
            include("SqlQuery.php");
        }

    else{
        $errorMsg = "<center><font color='#FF0000'><b>";
        $errorMsg.= "Não foi possível executar a ação no Banco de Dados.<br>";
        $errorMsg.= "O arquivo SqlQuerys não foi encontrado.";
        $errorMsg.= "</b></font></center>";
        echo "<br><br>".$errorMsg;
        exit;
    }

	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passConf = $_POST['passwordConfirm'];

  	if ($name == "" || $lastname == "" || $email == "" || $password == "" || $passConf == ""){
        echo "<center>Existem campos que não foram informados</center>";
        echo "<center><input type = 'button' value = 'Back' name = 'btnBack' Onclick = 'javascript:history.go(-1)'></center>";
    }
    
    else if($password != $passConf){
    	echo "<center>As senhas estão diferentes</center>";
    	echo "<center><input type = 'button' value = 'Back'";
        echo " name = 'btnBack' Onclick = 'javascript:history.go(-1)'></center>";
    }


    $Query = "insert into logins(name,lastname,email,password) values('$name','$lastName','$email', '$password')";

    $Result = SqlExec($Query);
    if ($Result){
    echo "<center>Cadastro efetuado com sucesso!</center>";
    echo "<center><input type = 'button' value = 'Back' name = 'btnBack' Onclick = 'javascript:history.go(-1)'></center>";
    }

?>