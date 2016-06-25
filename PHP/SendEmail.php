<?php

    require_once('class.phpmailer.php'); //chama a classe de onde você a colocou.

    session_start();

    $Result = $_SESSION['Result'];
    $To = $_POST['btnSendEmailTo'];
    $subject = $_POST['btnSendEmailRespect'];
    $body = $_POST['btnSendEmailBody'];
    $By = $_SESSION['email'];
    $nameBy = $Result[3];

    $mail = new PHPMailer(); // instancia a classe PHPMailer

    $mail->IsSMTP();

    //configuração do gmail
    $mail->Port = '465'; //porta usada pelo gmail.
    $mail->Host = 'smtp.gmail.com'; 
    $mail->IsHTML(true); 
    $mail->Mailer = 'smtp'; 
    $mail->SMTPSecure = 'ssl';

    //configuração do usuário do gmail
    $mail->SMTPAuth = true; 
    $mail->Username = 'itsmylifesenderemail@gmail.com'; // usuario gmail.   
    $mail->Password = '123!@#asd'; // senha do email.

    $mail->SingleTo = true; 

    // configuração do email a ver enviado.
    $mail->From = "$By"; 
    $mail->FromName = $nameBy; 

    $mail->addAddress($To); // email do destinatario.

    $mail->Subject = $subject; 
    $mail->Body = $body;

    if(!$mail->Send())
        echo "Erro ao enviar Email:" . $mail->ErrorInfo;


    header( "location: ../start.php");

?>