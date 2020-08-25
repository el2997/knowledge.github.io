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
  <link rel= "stylesheet" type= "text/css" href="../Kcss/college.css" />
  <link rel="stylesheet" href="../Kcss/swiper.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<header>
<div id="navbar">
  <div class="homeB">
  <a href="choosing.php">
  <h1> KNOWLEDGE </h1>
  </a>
  </div>

  <nav>
      <ul>
      <li><a href="middle.php">Home </a></li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Categories</a>
          <div class="dropdown-content">

              <a href="#">Math </a>
              <a href="#">Science </a>
              <a href="#">English </a>
              <a href="#">History </a>
              <a href="#">Language </a>
              <a href="#">Business </a>
          </div>

      </li>
      <form action="#">
      <input type="text" placeholder="Search...">
      <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      </ul>
  </nav>

</div>

</header>
<body>

<link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class = "loader-wrapper">
<span class="loader"><span class="loader-inner"></span></span>
</div>

<script>
  $(window).on("load", function(){
    $(".loader-wrapper").fadeOut("slow")
  });
</script>




<div class="netflix-slider">

    <div class="swiper-container">
    <h2>Recommended</h2>
      <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION wjdvkrv kwerbvklwerv ke klerjvkerjv jvblwker v kejvejrbvwer wejrvnw</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        <div class="swiper-slide"><a href="videos/video1.php"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>



  <div class="netflix-slider">

      <div class="swiper-container2">
        <h2>Last Watched</h2>
        <div class="swiper-wrapper">

          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
          <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-next2"></div>
        <div class="swiper-button-prev2"></div>
      </div>
    </div>



      <div class="netflix-slider">

          <div class="swiper-container3">

            <h2>Popular</h2>
            <div class="swiper-wrapper">
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"   alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
              <div class="swiper-slide"><a href="#"  alt="Movie Title"></a><div id="hovershow"><h4>DESCRIPTION</h4></div></div>
            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-next3"></div>
            <div class="swiper-button-prev3"></div>
          </div>
        </div>


  <!-- Swiper JS -->

  <script  src="../Kjs/three.js"></script>
  <script  src="../Kjs/college.js"></script>
  <script src="../Kjs/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 5,
      spaceBetween: 10,
      slidesPerGroup: 2,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

  <script>
    var swiper2 = new Swiper('.swiper-container2', {
      slidesPerView: 5,
      spaceBetween: 10,
      slidesPerGroup: 2,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next2',
        prevEl: '.swiper-button-prev2',
      },
    });
  </script>

  <script>
    var swiper2 = new Swiper('.swiper-container3', {
      slidesPerView: 5,
      spaceBetween: 10,
      slidesPerGroup: 2,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next3',
        prevEl: '.swiper-button-prev3',
      },
    });
  </script>



</body>


</html>
