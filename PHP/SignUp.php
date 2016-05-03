<?php 

    if(file_exists("SqlQuery.php"))
        include("SqlQuery.php");
    if (file_exists("User.class.php")) 
        include("User.class.php");

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

    $_USER = new User($name." ".$lastname, $_POST['email'], $_POST['password'], 
                        $_POST['passwordConfirm'], $_POST['street'], $_POST['number'], 
                        $_POST['complement'], $_POST['neighborhood'], $_POST['city'], 
                        $_POST['state'], $_POST['country'], $_POST['zipCode'], $_POST['phone']);


    if ($_USER->ContainsEmptyValue()){
        echo "<center>Existem campos que não foram informados</center>";
        echo "<center><input type = 'button' value = 'Back' name = 'btnBack' Onclick = 'javascript:history.go(-1)'></center>";
    }
    
    else if($_USER->password != $_USER->passConf){
        
        echo "<center>As senhas estão diferentes</center>".
            "<center><input type = 'button' value = 'Back'".
            " name = 'btnBack' Onclick = 'javascript:history.go(-1)'></center>";
   }

   else{
        $Result = $_USER->Address->DataBaseInsertAddress();

        $Result = $_USER->DataBaseInsertUser();


     
        if ($Result){

            echo "<center>Cadastro efetuado com sucesso!</center>".
                 "<center><input type = 'button' value = 'Back'".
                 " name = 'btnBack' Onclick = 'javascript:history.go(-1)'></center>";
        }
    }

?>