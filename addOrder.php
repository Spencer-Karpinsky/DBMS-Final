<?php
require 'connect.php';
if (isset($_POST['addOrder-submit'])) {
  $runningTotal=0;
  $sql = "SELECT Price FROM Cart";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result)){
    $price=$row['Price'];
    $runningTotal = $runningTotal + $price;
  }
  $runningTotal=$_POST['shipping']+$runningTotal;
  $sql2="INSERT INTO Orders (User_Id,Total_Price)
  VALUES
  ('$_POST[username]','$runningTotal')";
  mysqli_query($conn,$sql2);

  $sql3="TRUNCATE TABLE Cart";
  mysqli_query($conn,$sql3);
header("Location: ../store.php?");


}
