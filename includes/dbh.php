<?php

$servername ="localhost";
$email = "root";
$password = "";
$dBName = "knowledge3";

//create connection
$conn = mysqli_connect($servername,$email,$password,$dBName);


//check connection
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
