<?php
require 'connect.php';
if (isset($_POST['addCart-submit'])) {
  $sql="INSERT INTO Cart (Product_Name,Price)
  VALUES
  ('$_POST[Product]','$_POST[Price]')";
  mysqli_query($conn,$sql);

  $sql2 = "UPDATE `Product` SET `Quantity`=`Quantity`-1 WHERE `Product_Name`='$_POST[Product]'";
  mysqli_query($conn,$sql2);
header("Location: ../store.php?");
}
