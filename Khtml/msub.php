<?php
session_start();

if(!isset($_SESSION['userEmail'])){
  header('Location: index.php');
  exit();

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> KNOWLEDGE </title>
  <link rel= "stylesheet" type= "text/css" href="../Kcss/msub.css" />

</head>


<body>
    <a href="choosing.php" class="returnH">
    <h1> KNOWLEDGE</h1>
    </a>
    <script  src="../Kjs/three.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>
    <script  src="../Kjs/msub.js"></script>

  <div class = "loader-wrapper">
  <span class="loader"><span class="loader-inner"></span></span>
  </div>


  <script>
    $(window).on("load", function(){
      $(".loader-wrapper").fadeOut("slow")
    });
  </script>


<div class="container">

  <div class="borderB">
      <h2>Account</h2>
  </div>


  <div class="borderBD" id="container">
  <h3>MEMBERSHIP & BILLING</h3>


    <form action="../includes/update.php" method="post" >


      <button type= "submit" class= "ghost" id="unsub" name= "manageSub"> Cancel Membership :( </button>


    </form>

  </div>

  <div class="borderBT">

  <a href="msub.email.php" class="email">Change Email</a>
  <a href="msub.password.php" class="password">Change Password</a>
  <a href="msub.card.php" class="card">Change Card</a>



  <?php
  echo "<p> Email: ". $_SESSION['userEmail']."</p>";
  ?>

  <h4>Password: ******</h4>

  <?php
  $date= (int)$_SESSION['nextBill'];
  $date2 = date("F j, Y", $date);
  echo "<p> Your next billing date is:  ".$date2."</p>";
  ?>

  <?php
  echo "<p> Card:  **** **** **** ". $_SESSION['card']."</p>";
  ?>

  </div>


</div>



<footer>


</footer>
