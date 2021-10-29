<?php   
  require_once('config.php'); 
    $token = $_POST['stripeToken'];
    $email = $_POST['stripeEmail']; 
    $customer = \Stripe\Customer::create([
      'email' => $email,
      'source'  => $token,
    ]);

    $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount'   => 10000,
      'currency' => 'mxn',
    ]);
    header("location: ../Suscripcion.php");
    echo '<h1>Successfully charged 100.00 Pesos!</h1>';  
?>