<?php


  require_once ('../stripe-php/init.php');
  require 'dbh.php';


  \Stripe\Stripe::setApiKey('sk_test_HuImR7iqAYMKbenEIGI4A7Sh00RWVqNTmH');


//SANITIZE POST

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $email=  $POST['email'];
  $password =  $POST['pwd'];
  $passwordRepeat =  $POST['pwd-repeat'];
  $token = $POST['stripeToken'];





  //CREATE CUSTOMER IN STRIPE
  $customer = \Stripe\Customer :: create([

      "email" => $email ,
      "card" => $token,


  ]);

  //CHARGE CUSTOMER
  $subscription = \Stripe\Subscription :: create([
    'customer' => $customer->id,
    'items' => [
      [
        'price' =>  "price_HKqa1QPnbBWqeQ" ,
      ],
    ],
    'expand' => ['latest_invoice.payment_intent'],
  ]);

  if (!isset($POST['stripeToken'])){

    header("Location: ../Khtml/index.php?error=youWOULDAthoughtCLOWN");
    exit();

  }

$last4 = $customer->sources->data[0]->last4;
$start= $subscription->current_period_start;
$nextBill= $subscription->current_period_end ;

//CUSTOMER SIGN UP VALIDATIONS

if ( empty($email) || empty($password) || empty($passwordRepeat)){

    header("Location: ../Khtml/index.php?error=emptyfields");
    exit();

}

else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../Khtml/index.php?error=invalidemail");
  exit();

}
else if($password !== $passwordRepeat ){
  header("Location: ../Khtml/index.php?error=passwordcheck");
  exit();
}
  else{
    $sql = "SELECT email FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../Khtml/index.php?error=sqlerror1");
      exit();

}
  else {
    mysqli_stmt_bind_param($stmt, "s",$email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if (  $resultCheck > 0){
      header("Location: ../Khtml/index.php?error=emailtaken");
      exit();
    }

    else{
        $sql = "INSERT INTO users(email, password,regDate, subId, last4 , bill) VALUES ( ? , ?,  NOW(), ?, ?, ?) ";
        $stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../Khtml/index.php?error=sqlerror2");
          exit();

        }
        else{
          $hashPwd = password_hash($password, PASSWORD_DEFAULT );


          mysqli_stmt_bind_param($stmt, "sssss", $email, $hashPwd, $subscription->id, $last4, $nextBill);

          session_start();



          $_SESSION['userEmail'] = $email;
          $_SESSION['pwd'] = $password;
          $_SESSION['card'] = $last4;
          $_SESSION['nextBill'] = $nextBill;
          $_SESSION['sub'] = $subscription->id ;
          $_SESSION['start'] = $start;

          mysqli_stmt_execute($stmt);



        }
}
}
}

mysqli_stmt_close($stmt);
    mysqli_close($conn);




header("Location: ../Khtml/choosing2.php?email=".$email);
exit();
