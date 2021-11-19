<?php    
    class Email { 
        public function Enviar($cadena,$ddd, $data2){  
            return $ss="Hola mundoi ";
        } 

        public function Metodo_Enviar($cadena,$ddd,$data2){ 
            require ("Phpmailer_Lib.php");
            $obj = new Phpmailer_Lib();
            $mail = $obj->load();
            $mail->SMTPDebug = 0;
            $mail->IsSMTP(); 

            $mail->SMTPAuth = true;
            $mail->Username = 'ejemplo.correo2020hoy@gmail.com';
            $mail->Password = '#angel95#';
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPSecure =  'TLS';
            $mail->Port     = 587;   
            $mail->setFrom('ejemplo.correo2020hoy@gmail.com', 'Bienvenid@'); 
            $mail->addAddress($cadena);  
            $mail->addBCC('ejemplo.correo2020hoy@gmail.com');
            //$mail->addCC('john_wlegna@hotmail.com');
            $mail->Subject = 'Bienvenidos'; 
             
            $mail->isHTML(true); 
            $mail->CharSet = 'UTF-8';
            $mailContent = "<html>
            <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title></title>
                <meta http-equiv='Content-type' content='text/html;charset=UTF-8' />
                <meta charset='utf-8'>
                <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>
<body style='margin:0;padding:0;word-spacing:normal;background-color:#939297;'>
  <div role='article' aria-roledescription='email' lang='en' style='text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;'>
    <table role='presentation' style='width:100%;border:none;border-spacing:0;'>
      <tr>
        <td align='center' style='padding:0;'>
          <!--[if mso]>
          <table role='presentation' align='center' style='width:600px;'>
          <tr>
          <td>
          <![endif]-->
          <table role='presentation' style='width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;'>
            <tr>
              <td style='padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;'>
                <a href='' style='text-decoration:none;'><img src='https://lomejorspm.com.mx/logotipo%20inmuebles.png' width='165' alt='Logo' style='width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;'></a>
              </td>
            </tr>
            <tr>
              <td style='padding:30px;background-color:#ffffff;'>
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Te damos la Bienvenida a <br>INMUEBLES EN MÉXICO </h1>
                <p style='margin:0;'>
                Te damos la bienvenida a nuestra plataforma: $ddd </p>
              </td>
            </tr>  
            <tr>
              <td style='padding:30px;font-size:24px;line-height:28px;font-weight:bold;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);'>
                <a href='http://www.example.com/' style='text-decoration:none;'><img src='https://assets.codepen.io/210284/1200x800-1.png' width='540' alt='' style='width:100%;height:auto;border:none;text-decoration:none;color:#363636;'></a>
              </td>
            </tr>
            <tr>
              <td style='padding:30px;background-color:#ffffff;'>
                <p style='margin:0;'>
                    Felicidades por elegir el plan de : $data2
                </p>
              </td>
            </tr>
            <tr>
              <td style='padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;'>
              </td>
            </tr>
          </table> 
        </td>
      </tr>
    </table>
  </div>
            </body>
            </html>";
            $mail->Body = $mailContent; 
            // Send email  
            if(!$mail->send()){
                echo 'No se pudo enviar el mensaje.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                echo 'enviado';
            } 
        } 
    }
?>
      