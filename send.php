<?php

include "class.phpmailer.php";
include "class.smtp.php";
//var_dump($_GET);
if (isset($_GET["send"])) {
    $email_user = "contactocopoya@gmail.com";
    $email_password = "Mexico52";
    $the_subject = "Contacto";
    $address_to = "copoyainmobiliaria@gmail.com";
    $from_name = $_GET["name"];
    $phpmailer = new PHPMailer();

// ---------- datos de la cuenta de Gmail -------------------------------
    $phpmailer->Username = $email_user;
    $phpmailer->Password = $email_password;
//-----------------------------------------------------------------------
    $phpmailer->SMTPDebug = 1;
    $phpmailer->SMTPSecure = 'ssl';
    $mail->SMTPSecure = 'tls';
    $phpmailer->Host = "smtp.gmail.com"; // GMail
    $phpmailer->Port = 587;
    $phpmailer->isMail(); // use SMTP
    $phpmailer->SMTPAuth = true;

    $phpmailer->setFrom($phpmailer->Username, $from_name);
    $phpmailer->AddAddress($address_to); // recipients email

    $phpmailer->Subject = $the_subject;
    $phpmailer->Body .= "<h1 style='color:#3498db;'>Contactame</h1>";
    $phpmailer->Body .= "<p>Nombre: " . $_GET["name"] . "</p>";
    $phpmailer->Body .= "<p>Fecha y Hora: " . date("d-m-Y h:i:s") . "</p>";
    $phpmailer->Body .= "<p>Email: " . $_GET["email"] . "</p>";
    $phpmailer->Body .= "<p>Teléfono: " . $_GET["telefono"] . "</p>";
    $phpmailer->Body .= "<p>Descripción: " . $_GET["description"] . "</p>";

    $phpmailer->IsHTML(true);
    echo '<br>';
    var_dump($phpmailer->Send());
}
?>