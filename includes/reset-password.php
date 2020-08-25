<?php

  if (isset($_POST["reset-password-submit"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)){
      header("Location: ../Khtml/create-new-password.php?selector=".$selector."&validator=".bin2hex($token)."error=emptyfields");
      exit();

    }else if($password != !$passwordRepeat) {
      header("Location: ../Khtml/create-new-password.php?selector=".$selector."&validator=".bin2hex($token)."error=passwordDONTmatch");
      exit();

    }

    $currentDate = date("U");

    require "dbh.php";

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "There was an error!";
      header("Location:  ../Khtml/create-new-password.php?selector=".$selector."&validator=".bin2hex($token)."error=passwordDONTmatch");
      exit();
//INCLUDE CURRENTDATE BELOW
    } else{
      mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if(!$row = mysqli_fetch_assoc($result)){
        echo "<h3>You need to re-submit your reset request!</h3>";
        header("Location:  ../Khtml/forgot.php");
        exit();

      } else{

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

        if ($tokenCheck == false) {
          echo "<h3>You need to re-submit your reset request!</h3>";
          header("Location:  ../Khtml/forgot.php");
          exit();

        } elseif ($tokenCheck == true) {

            $tokenEmail = $row['pwdResetEmail'];

            $sql = "SELECT * FROM users WHERE email=?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
              echo "There was an error!";
              header("Location:  ../Khtml/create-new-password.php?selector=".$selector."&validator=".bin2hex($token)."error=passwordDONTmatch");
              exit();

            } else{

              mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              if(!$row = mysqli_fetch_assoc($result)){
                echo "<h3>There was an error</h3>";
                header("Location: ../Khtml/forgot.php");
                exit();

              } else{

                $sql = "UPDATE users SET password=? WHERE email=?";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                  echo "There was an error!";
                  header("Location:  ../Khtml/forgot.php");
                  exit();

                } else{

                  $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                  mysqli_stmt_execute($stmt);

                  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                  $stmt = mysqli_stmt_init($conn);

                  if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "There was an error!";
                    header('Location: ../Khtml/forgot.php');
                    exit();

                  } else{
                    mysqli_stmt_bind_param($stmt, "s", $userEmail);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Khtml/index.php?newpwd=passwordupdated");
                  }
                }
        }


      }
    }

   else{
    header("Location: ../Khtml/index.php");
    exit();
  }

}}}
?>
