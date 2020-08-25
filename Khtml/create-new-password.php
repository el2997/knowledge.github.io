<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> KNOWLEDGE </title>
  <link rel= "stylesheet" type= "text/css" href="../Kcss/create-new-password.css" />

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


<h1> KNOWLEDGE</h1>


<?php

  $selector = $_GET["selector"];
  $validator = $_GET["validator"];

  if(empty($selector) || empty($validator)) {
      echo '<h3> Could not validate request </h3>';

  }else{
    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
      ?>

      <div class="container">
        <form action ="reset-password.php" method="post">

          <h2> Create New Password </h2>

          <input type = "hidden" name = "selector" value =" <?php echo $selector ?> ">
          <input type = "hidden" name = "selector" value =" <?php echo $validator ?> ">

          <input type = "password"   name = "pwd" placeholder = "Enter New Password" >

          <input type = "password"  name = "pwd-repeat" placeholder = "Repeat New Password" >

          <button type = "submit" class= "ghost" name = "reset-password-submit" > Reset Password</button><br>
        </form>
      </div>



      <?php
    }
  }
?>






<script type="text/javascript" src="../Kjs/index.js" charset="utf-8"></script>
<script  src="../Kjs/three.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</body>

<footer>

</footer>

</html>
