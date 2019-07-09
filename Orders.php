<?php
  require "header.php";
  require 'includes/connect.php';
  $getUName = $_SESSION['logedIn'];
  $sql = "SELECT * FROM Orders WHERE User_Id = '$getUName'";
  $result=mysqli_query($conn,$sql);
  echo "<h1>Your Orders</h1> ";
  while($row=mysqli_fetch_array($result)){
    $OrderNum = $row['Order_Num'];
    $TotalPrice = $row['Total_Price'];
    echo "<h5>Order Number:$OrderNum      Price Paid:$TotalPrice</h5> <br />";
  }
?>



<?php
  require "footer.php";
?>
