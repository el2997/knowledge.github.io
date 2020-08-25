<?php
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> KNOWLEDGE </title>
  <link rel= "stylesheet" type= "text/css" href="../Kcss/index.css" />
  <script src="https://js.stripe.com/v3" ></script>
</head>


<body>



    <script  src="../Kjs/three.js"></script>
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




  <div class = "logINbox" id="container">
    <div class = "form-container sign-up-container">


      <form action="../include/charge.php" method="post" id="payment-form">


        <h2> KNOWLEDGE </h2>

            <div class="form-row">
              <input type = "text"  name = "email" placeholder = "Email" >

              <input type = "password"   name = "pwd" placeholder = "Password" >

              <input type = "password"  name = "pwd-repeat" placeholder = "Repeat Password" >

                <div id= "card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                </div>


              <button type= "submit" class= "ghost2" name= "signUp-submit">Create Account</button>
      </form>



    </div>



    <script type="text/javascript"  src="../includes/script.js" charset="utf-8"></script>

      <div class="form-container sign-in-container">
        <form action ="../includes/login.php" method="post">
          <h2> Sign In</h2>
          <input type = "text" name= "email" placeholder = "Email">
          <input type = "password" name = "pwd" placeholder = "Password">
          <button type = "submit" class= "ghost3" name = "signIn-submit"> Sign In</button><br>
          <a href="#">Forgot your password?</a>
        </form>
      </div>

    <div class="overlay-container">
      <div class= "overlay">
        <div class= "overlay-panel overlay-left">
          <h2> Welcome Back!</h2>
          <button class="ghost" id="signIn"> Sign In </button>
        </div>
        <div class= "overlay-panel overlay-right">
          <h2> Hello, Scholar!</h2>
          <p> For only $6 a month and a 15 day free trial gain access to educational content from the best teachers
          across the United States!</p>
          <button class ="ghost" id="signUp">Create Account </button>
        </div>
      </div>
    </div>

  </div>



<script type="text/javascript" src="../Kjs/index.js" charset="utf-8"></script>
<script  src="../Kjs/three.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>

<footer>
<h4>MISSION STATEMENT</h4>

</footer>

</html>
