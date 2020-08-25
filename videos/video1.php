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
  <link rel= "stylesheet" type= "text/css" href="../../Kcss/video1.css" />
  <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>
  <script  src="../../Kjs/video1.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <a id="returnLink" href="../college.php"> <- </a>
  <div id= "video_player_box">
    <video id= "my_video" autoplay>

      <source src= "170609_C_Agra_040_1.mp4">

    </video>


      <div id= "video_controls_bar">

        <button id= "playpausebtn">Pause</button>
        <button id= "mutebtn">Mute </button>
        <button id= "fullscreenbtn">Full </button>


        <progress id="seekslider2" type="range" min="0" max="100" value="0" step="1"></progress>
        <input id ="seekslider" class= "slider" type = "range" min ="1" max ="100" value="1" step="1">

          <div id ="vol">
            <input id ="volumeslider"  type = "range" min ="0" max ="100" value="100" step="1">
          </div>

        <span id ="curtimetext">00:00</span> <span id="dumbSlash">/</span> <span id = "durtimetext"> 00:00</span>
      </div>
</div>
</body>
</html>
