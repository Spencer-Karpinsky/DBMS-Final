<?php
if (isset($_POST['login-submit'])) {
  session_start();
  require 'connect.php';

  $mailuid = $_POST['userId'];
  $password = $_POST['password'];


  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {

    $sql2 = "SELECT * FROM Admin WHERE AdminUserID=?";
    $stmt2 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt2, $sql2);
    mysqli_stmt_bind_param($stmt2, "s",$mailuid);
    mysqli_stmt_execute($stmt2);
    $result = mysqli_stmt_get_result($stmt2);
    if ($row = mysqli_fetch_assoc($result)) {
      if ($mailuid == $row['AdminUserID']) {
        $_SESSION['Admin'] = $row['AdminUserID'];
      }
    }


    $sql = "SELECT * FROM Customer WHERE User_Id=? OR Email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['Password']);
        if ($pwdCheck == false) {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {

          $_SESSION['logedIn'] = $row['User_Id'];

          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../signup.php");
  exit();
}
