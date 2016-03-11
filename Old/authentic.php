<?php 
 
    $email =  mysql_escape_string($_POST['email']);
    $submit = $_POST['btnLogin'];
    $password =  mysql_escape_string(($_POST['password']));
    $connect = mysql_connect('127.0.0.1','root','123!@#asd');
    $db = mysql_select_db('itsmylife');


        
       if (isset($submit)) {           
           
            $verify = mysql_query("SELECT * FROM logins WHERE email = $email AND password = $password") or die("erro ao selecionar");
                
                if (mysql_num_rows($verify)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
                    die();
                
                }else{
                   header("Location:validou.html");
                    setcookie("login",$email);
                }
        }
   
?>
