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
  <link rel= "stylesheet" type= "text/css" href="../Kcss/choosing.css" />

</head>


<body>
    <h1> KNOWLEDGE</h1>
    <script  src="../Kjs/three.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>
    <script  src="../Kjs/choosing.js"></script>

  <div class = "loader-wrapper">
  <span class="loader"><span class="loader-inner"></span></span>
  </div>



<a href="msub.php"> <h3>Manage Subscription</h3></a>




  <script>
    $(window).on("load", function(){
      $(".loader-wrapper").fadeOut("slow")
    });
  </script>



<a href="toddlers.php">
  <div class = "toddlers" >

    <div class= "SIGN_IN">
      <h2>Toddlers</h2>
    </div>
  </div>
  </a>



  <a href="elementary.php">
  <div class = "elementary" >

    <div class= "SIGN_IN">
      <h2>Primary</h2>
    </div>
  </div>
  </a>



  <a href="middle.php">
  <div class = "middle">

    <div class= "SIGN_IN">
      <h2>Middle</h2>
    </div>
  </div>
  </a>



  <a href="high.php">
  <div class = "high">

    <div class= "SIGN_IN">
      <h2>High</h2>
    </div>
  </div>
  </a>


  <a href="college.php">
  <div class = "college">

    <div class= "SIGN_IN">
      <h2>College</h2>
    </div>
  </div>
  </a>



  <a href="careers.php">
  <div class = "careers">

    <div class= "SIGN_IN">
      <h2>Careers & Skills</h2>
    </div>
  </div>
  </a>



</body>

<footer>

</footer>
