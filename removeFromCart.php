<?php
require 'connect.php';
if (isset($_POST['removefromcart-submit'])) {
  $item =$_POST['Product'];
  $sql="DELETE FROM Cart WHERE Product_Name = '$item' LIMIT 1";
  mysqli_query($conn,$sql);

  $sql2 = "UPDATE `Product` SET `Quantity`=`Quantity`+1 WHERE `Product_Name`='$_POST[Product]'";
  mysqli_query($conn,$sql2);
  header("Location: ../cart.php?cart-submit=");
}
