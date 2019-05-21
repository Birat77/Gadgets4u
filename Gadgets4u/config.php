<?php

require_once 'init.php';

$stripeDetails = array(
"secretkey"=>"sk_test_cxf3hqTCK1r5lnTGdGELxeBd",
"publishablekey"=>"pk_test_hNNDJIgv2Ve0C223QnrUPzhf"


);
\Stripe\Stripe::setApiKey($stripeDetails['secretkey']);