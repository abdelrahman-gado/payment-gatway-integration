<?php

require_once "./stripe-php-master/init.php";

\Stripe\Stripe::setApiKey('sk_test_51LrRboIeARUkufCKfCjx5d4pItJJxyThXgZJjX7EshEylExUrO1xML5GfjOZljGSHnyXFtFYoLeuxMdEI8XatZFW00TKbnj8OS');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:8000';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LrT2sIeARUkufCKc7f7C1Mo',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);