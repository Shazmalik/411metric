<?php 
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_JKObdbr7CTqCIwUFIZl9Nr8k",
  "publishable_key" => "pk_test_clcxEaMO795J1wqZF2TGRiPz"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);


if($_POST){
	$token  = $_POST['stripeToken'];
  	$email  = $_POST['stripeEmail'];

	$customer = \Stripe\Customer::create(array(
	      'email' => $email,
	      'source'  => $token
	));
	
	$charge = \Stripe\Charge::create(array(
	      'customer' => $customer->id,
	      'amount'   => 5000,
	      'currency' => 'usd'
	));
  
  	echo "<pre>";
	print_r($charge);
	exit;
  
}
?>

<form action="#" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>
</form>