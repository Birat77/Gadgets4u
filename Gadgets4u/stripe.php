<?php

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
require_once 'config.php';
\Stripe\Stripe::setVerifySslCerts(false);


// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
$amount = $_POST['amount'];

$charge = \Stripe\Charge::create([
    'amount' => $amount,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);



?>