<?php
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


if (isset($POST["signIn-submit"])) {

    require 'dbh.php';

    $email=  $POST['email'];
    $password = $POST['pwd'];


    if (empty($email) || empty($password)){
      header("Location: ../Khtml/index.php?error=emptyfields");
      exit();

    }
    else {
      $sql = "SELECT * FROM users WHERE email= ?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql )){
        header("Location: ../Khtml/index.php?error=sqlerror");
        exit();


      }
      else{


          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);
          $result= mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password , $row['password']);
            if($pwdCheck == false){
              header("Location: ../Khtml/index.php?error=noUser");
              exit();

            }
            else if ($pwdCheck == true) {
              session_start();

              $_SESSION['userEmail'] = $row['email'];
              $_SESSION['pwd'] = $row['password'];
              $_SESSION['card'] = $row['last4'];
              $_SESSION['nextBill'] = $row['bill'];
              $_SESSION['sub'] = $row['subId'];
              $_SESSION['start'] = $row['regDate'];


              header("Location: ../Khtml/choosing.php?email=".$email);
              exit();

            }
            else {
              header("Location: ../Khtml/index.php?error=noUser");
              exit();


            }

          }
          else {
            header("Location: ../Khtml/index.php?error=noUser");
            exit();
          }
      }


    }



}

else{
  header("Location: ../Khtml/index.php?");
  exit();


}
