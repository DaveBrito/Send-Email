<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



include("includes/config.php");
include("vendor/autoload.php");

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //Server settings
    $mail->isSMTP();                                                //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'naorespondaagr@gmail.com';                 //SMTP username
    $mail->Password   = '######';                                   //SMTP password
    $mail->Port       = 587;                                       //porta do goole
    

    //Recipients
    $mail->setFrom('naorespondaagr@gmail.com', 'Fatec ZS');       //quem entrou em contato
    $mail->addAddress('davibritojunior1@gmail.com', 'Davi');     //quem irá receber o email

    //Content
    $mail->isHTML(true);                                //Set email format to HTML
    $mail->Subject = 'Contato do Site';
    $mail->Body    = 'Fatec entrou em contato</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';        //caso o navegador nao tenha html para fazer a leitura

    $mail->send();
    echo 'E-mail enviado com sucesso';
} catch (Exception $e) {
    echo "Error ao enviar o e-mail. Mailer Error: {$mail->ErrorInfo}";
}
?>
