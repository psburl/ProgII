<?php 
 
    $name = mysql_escape_string($_POST['name']);
    $lastName = mysql_escape_string($_POST['lastName']);
    $email =  mysql_escape_string($_POST['email']);
    $password =  mysql_escape_string(($_POST['password']));
    $passwordConfirm =  mysql_escape_string(($_POST['passwordConfirm']));
    $connect = mysql_connect('127.0.0.1','root','123!@#asd');
    $db = mysql_select_db('itsmylife');
    $submit = $_POST['btnSignUp'];

       if (isset($submit)) {

           if($password <> $passwordConfirm){
                
           }

            else{          
            
            $insert = mysql_query("INSERT into logins values('','$name','$email', '$password','')", $connect) or die("erro ao selecionar");

            if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
                }

                
            }
        }
   
?>
