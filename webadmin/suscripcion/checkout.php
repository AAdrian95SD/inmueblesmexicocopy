<?php 
session_start();
@$codePr = $_GET['code']; 
@$idPro = $_GET['id_'];
$_SESSION["codigoPlan"]=$idPro;
require 'vendor/autoload.php';
 \Stripe\Stripe::setApiKey('sk_test_51JnoHIJSVDYXHw718mtViQHgO2EmfE83TggsH3iGTMD2fIKuwkofFNnG0A43IG7qVK3u2hMvlEVzI30PX0K7MI0u00Y6RIZn6O');

  $checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => "http://localhost/inmueblesmexicocopy/webadmin/index.php",
      'cancel_url' => 'http://localhost/stripe-subscription/cancel.html',
      'payment_method_types' => ['card'],
      'mode' => 'subscription',
      'line_items' => [[
        'price' => $codePr,
        // For metered billing, do not pass quantity
        'quantity' => 1,
      ]],
    ]);

?>
<head>
  <title>Stripe Subscription Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <script type="text/javascript">
     var stripe = Stripe('pk_test_51JnoHIJSVDYXHw71k6Mo4MH5PrvsWCaKEA4LOgDbT5h2EulARWrqTH5wIwoZ7qlJ7Bd9voNAv7rz9O7ePueCGs4f00Gx24muO2');
     var session = "<?php echo $checkout_session['id']; ?>";
          stripe.redirectToCheckout({ sessionId: session })
                  .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });          



  </script>
  
</body>

