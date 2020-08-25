<?php
session_start();

if(!isset($_SESSION['userEmail'])){
  header('Location: ../Khtml/index.php');
  exit();

}

require 'dbh.php';
require_once '../stripe-php/init.php';

\Stripe\Stripe::setApiKey('sk_test_HuImR7iqAYMKbenEIGI4A7Sh00RWVqNTmH');

if (isset($_POST["manageSub"])) {


    $sql = "DELETE FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "There was an error!";
      header('Location: ../Khtml/msub.php');
      exit();

    } else{
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['userEmail']);
      mysqli_stmt_execute($stmt);


    }

    $sql = "INSERT INTO UNSUBSCRIBERS(email, start, ended) VALUES ( ? , ?,  NOW()) ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: Khtml/msub.php?error=insertUNSUBerror");
      exit();

    }
    else{

      mysqli_stmt_bind_param($stmt, "ss",$_SESSION['userEmail'],$_SESSION['start'] );
      mysqli_stmt_execute($stmt);

      mysqli_stmt_close($stmt);
          mysqli_close($conn);
}


  $subscription = \Stripe\Subscription::retrieve($_SESSION['sub']);
  $subscription->cancel();

  session_destroy();
  header("Location: ../Khtml/index.php?SubscriptionCancelled");
  exit();

}


  else{
    header("Location: ../Khtml/index.php");
    exit();
}



?>
