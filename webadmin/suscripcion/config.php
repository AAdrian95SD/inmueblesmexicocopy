<?php
require_once('vendor/autoload.php');

//pruebas
/*$stripe = array(
    'secret_key' => 'sk_test_4qeORmbbBs4BOcFZnsToWH1l',
    'publishable_key' => 'pk_test_EGAPBj1LAN1cRR5LQ5cbcgzj',
);*/

$stripe = array(
    'secret_key' => 'sk_test_51JnoHIJSVDYXHw718mtViQHgO2EmfE83TggsH3iGTMD2fIKuwkofFNnG0A43IG7qVK3u2hMvlEVzI30PX0K7MI0u00Y6RIZn6O',
    'publishable_key' => 'pk_test_51JnoHIJSVDYXHw71k6Mo4MH5PrvsWCaKEA4LOgDbT5h2EulARWrqTH5wIwoZ7qlJ7Bd9voNAv7rz9O7ePueCGs4f00Gx24muO2',
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
