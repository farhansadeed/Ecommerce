<?php
require('stripe/init.php');

$publishableKey="pk_test_yourKey";

$secretKey="sk_test_yourkey";

\Stripe\Stripe::setApiKey($secretKey);
?>
