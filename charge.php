<?php 
    require_once('vendor/autoload.php');
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');
    require_once('models/Transaction.php');
    \Stripe\Stripe::setApiKey('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
 
    // Sanitize POST array 
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

   $first_name = $POST['first_name'];
   $last_name = $POST['last_name'];
   $email = $POST['email'];
   $token = $POST['stripeToken'];

   // Create Customer in Stripe
   $customer = \Stripe\Customer::create([
       "email" => $email,
       "source"=> $token
        ]);

   // Charge Customer 
   $charge = \Stripe\Charge::create([
       'amount' => 5000, 
       'currency' => 'usd', 
       'description' => 'Product Description',
       "customer" => $customer->id
       ]);

   // Customer Data 
   $customerData = [
        'id' => $charge->customer,
        'first_name' => $first_name,
        'last_name' =>  $last_name,
        'email' => $email
   ];

   // Instantiate Customer 
   $customer = new Customer();

   // Add Customer To DB 
   $customer->addCustomer($customerData);


   // Customer Data 
   $transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' =>  $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status,

];

    // Instantiate Customer 
    $transaction = new Transaction();

    // Add Customer To DB 
    $transaction->addTransaction($transactionData);
   
  //var_dump($charge);

  // Redirect to success
  header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);