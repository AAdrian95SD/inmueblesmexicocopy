<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout PHP - Jose Aguilar</title>
    <meta name="description" content="Pasarela de pago con Stripe y PHP."/>
    <meta name="author" content="Jose Aguilar">
    <link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"> 
</head>
<?php
    require './views/estilos.php'; 
    require './views/header.view.php';
?>
<body> 
    <div class="container"> 
        <div class="row">
            <div id="content" class="col-lg-12">
                <?php require_once('config.php'); ?>
                    <form action="<?php echo RUTA ?>suscripcion/charge.php" method="post">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo $stripe['publishable_key']; ?>"
                        data-description="Envia un donativo simbolico de 100.00 pesos"
                        data-amount="10000"
                        data-currency="MXN"
                        data-locale="MNX"></script>
                    </form>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Bloque de anuncios adaptable -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-6676636635558550"
                    data-ad-slot="8523024962"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
     <?php 
     
        require 'footer.view.php';
     ?>
    </div> 
</body> 