<?php 

    if(file_exists("SqlQuery.php"))
        include("SqlQuery.php");

    if (file_exists("User.class.php")) 
        include("User.class.php");

    else{
        
        $errorMsg = "<center>".
                        "<font color='#FF0000'>".
                            "Não foi possível executar a ação no Banco de Dados.<br>".
                            "O arquivo SqlQuerys não foi encontrado.".
                        "</font>".
                    "</center>";
        
        echo $errorMsg;
        exit;
    }

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];

    $_USER = new User($name." ".$lastname, $_POST['email'], $_POST['password'], 
                        $_POST['passwordConfirm'], $_POST['street'], $_POST['number'], 
                        $_POST['complement'], $_POST['neighborhood'], $_POST['city'], 
                        $_POST['state'], $_POST['country'], $_POST['zipCode'], $_POST['phone']);


    if ($_USER->ContainsEmptyValue()){
        
        echo "<center>".
                "Existem campos que não foram informados".
                "<input type = 'button' value = 'Back' name = 'btnBack' Onclick = 'javascript:history.go(-1)'>".
            "</center>";
    }
    
    else if($_USER->password != $_USER->passConf){
        
        echo "<center>".
                "As senhas estão diferentes".
                "<input type = 'button' value = 'Back' name = 'btnBack' Onclick = 'javascript:history.go(-1)'>".
            "</center>";
   }

   else{

        $Result = $_USER->Address->DataBaseInsertAddress();
      
        $Result = $_USER->DataBaseInsertUser();

        if ($Result){

            $email = $_POST['email'];

            $Query = "insert into userStorage(email, filepath) values ('$email' ,'/var/www/html/ProgII/files/')";
            $Result = SqlExec($Query);

            $Query = "SELECT * FROM userStorage WHERE email = '$email'";
            $Result =  SqlExec($Query);
            $Result = pg_fetch_array($Result);
            
            echo $Result[0];
            $dir = '/var/www/html/ProgII/files/'.$Result[0];
            mkdir($dir, 0777);

            echo "<center>".
                    "Cadastro efetuado com sucesso!".
                    "<input type = 'button' value = 'Back' name = 'btnBack' Onclick = 'javascript:history.go(-1)'>".
                "</center>";
        }
    }

?>