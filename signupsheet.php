<?php
if (isset($_POST['signup-submit'])) {


  require 'connect.php';

  $username = $_POST['newUserId'];
  $email = $_POST['mail'];
  $fName = $_POST['userFname'];
  $lName = $_POST['userLname'];
  $address = $_POST['userAddress'];
  $phoneNum = $_POST['userPhoneNum'];
  $password = $_POST['newPassword'];
  $passwordRepeat = $_POST['password-repeat'];


  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&newUserId=".$username."&mail=".$email);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidnewUserIdmail");
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidnewUserId&mail=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&newUserId=".$username);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&newUserId=".$username."&mail=".$email);
    exit();
  }
  else {
    $sql= "SELECT User_Id FROM Customer WHERE User_Id =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        $sql= "INSERT INTO Customer (Fname,Lname,User_Id,Email,Password,Phone_Num,Address) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sssssss", $fName, $lName, $username, $email, $hashedPassword, $phoneNum, $address);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?signup=success");
          exit();
        }
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
