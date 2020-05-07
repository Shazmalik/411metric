<?php 
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_JKObdbr7CTqCIwUFIZl9Nr8k",
  "publishable_key" => "pk_test_clcxEaMO795J1wqZF2TGRiPz"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

$charge = \Stripe\Charge::create(array(
      'customer' => "cus_DqnJ6Jtyz8N9Ya",
  	  'amount'   => 5000,
  	  'currency' => 'usd'
));
  
echo "<pre>";
print_r($charge);
exit;
?>
