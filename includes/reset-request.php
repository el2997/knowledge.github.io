<?php
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
require 'dbh.php';

if (isset($POST["reset-request-submit"])) {
  $userEmail = $POST["email"];

  if (empty($userEmail)){
    header("Location: ../Khtml/forgot.php?reset=emptyfields");
    exit();


    }else {
      $sql = "SELECT * FROM users WHERE email= ?;";
      $stmt = mysqli_stmt_init($conn);


      if (!mysqli_stmt_prepare($stmt, $sql )){
        header("Location: ../Khtml/index.php?error=sqlerror");
        exit();


        }else{

        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)){


          $selector = bin2hex(random_bytes(8));
          $token = random_bytes(32);

          $url = "Khtml/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

          $expires = date("U") + 1800;





          $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
          $stmt = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error!";
            header('Location: ../Khtml/forgot.php');
            exit();

          } else{
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
          }

          $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires)
          VALUES(?, ?, ?, ?);";

          $stmt = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error!";
            header('Location: ../Khtml/forgot.php');
            exit();

          } else{

            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);

          }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);



          $to = $userEmail;

          $subject ='Reset your password for KNOWLEDGE';

          $message = '<p> We recieved a password reset request. The link to reset your password is below.
          If you did not make this request, you can ignore this email</p>';

          $message .= '<p>Here is your password reset link: </br>';
          $message .= '<a href="' . $url . '">'. $url . '</a></p>';

          $headers = "From: KNOWLEDGE <eliomarlopez97@gmail.com> \r\n";
          $headers .= "Reply-To: eliomarlopez97@gmail.com\r\n";
          $headers .= "Content-type: text/html\r\n";

          mail($to, $subject, $message, $headers);

          header("Location: ../Khtml/forgot.php?reset=success");



        }else {
            header("Location: ../Khtml/forgot.php?reset=noUser");
            exit();


}
}
}
}
