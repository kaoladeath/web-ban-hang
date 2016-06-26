<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 4;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.mail.yahoo.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "hongducphannuyen@yahoo.com";
$mail->Password = 'Khinguoiloncodon09061994';
$mail->setFrom("hongducphannuyen@yahoo.com","test email");
$mail->addReplyTo("hongducphannuyen@yahoo.com","hong duc");
$mail->addAddress('hongduc_1994@yahoo.com','duc hong');
$mail->Subject = "Test mail";
$mail->msgHTML("hello world");
$mail->AltBody = "day la AltBody";

if(!$mail->send()){
    echo 'co loi khi gui mail: ' . $mail->ErrorInfo;
}else{
    echo 'da gui thanh cong';
}
