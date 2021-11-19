<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    class Phpmailer_Lib
    { 
        public function load(){
        // Include PHPMailer library files
            require('vendor/autoload.php');
            require('PHPMailer/Exception.php');
            require('PHPMailer/PHPMailer.php');
            require('PHPMailer/SMTP.php');
        
            $mail = new PHPMailer;
            return $mail;
        }
    }
?>