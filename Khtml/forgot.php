<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> KNOWLEDGE </title>
  <link rel= "stylesheet" type= "text/css" href="../Kcss/forgot.css" />

</head>



<body>



    <script src="../Kjs/three.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>


    <div class = "loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
      $(window).on("load", function(){
      $(".loader-wrapper").fadeOut("slow")
    });
    </script>


<a href="index.php"> KNOWLEDGE</a>

<div class="container">


  <form action ="../includes/reset-request.php" method="post">

    <h2> Password Recovery</h2>

    <input type = "text" name= "email" placeholder = "Enter Email Address">

    <button type = "submit" class= "ghost" name = "reset-request-submit" >Send Email Link </button><br>


  </form>

</div>

<?php

  if (isset($_GET["reset"])){
    if($_GET["reset"] == "success"){
      echo '<h3> Check your email and click on the link!</h3>';

    }
    if($_GET["reset"] == "noUser"){
      echo '<h3> No user with that email, try again! </h3>';

    }
    if($_GET["reset"] == "emptyfields"){
      echo '<h3> No email submitted </h3>';

    }

  }



?>




<script type="text/javascript" src="../Kjs/forgot.js" charset="utf-8"></script>
<script  src="../Kjs/three.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</body>

<footer>

</footer>

</html>
