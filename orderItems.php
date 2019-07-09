<?php
require 'connect.php';
if (isset($_GET['cart-submit'])) {
$getUName = $_SESSION['logedIn'];
$orderForm="";
$sql = "SELECT * FROM Customer WHERE User_Id = '$getUName'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  $username = $row['User_Id'];
  $email = $row['Email'];
  $fName = $row['Fname'];
  $lName = $row['Lname'];
  $address = $row['Address'];
}

 $orderForm.="
 <form class='form-signup' action='includes/addOrder.php' method = 'post'>
  <input type='text' value=$fName required />
  <input type='hidden' name='username' value=$username />
  <input type='text' value=$lName required />
  <input type='text' value='$address' required />
  <input type='text' placeholder='Credit Card Number' required /><br />
  <p>Choose Shipping Method</p>
  <input type='radio' name='shipping' value='5.00' required >Ground Delivery $5.00
  <input type='radio' name='shipping' value='12.00'>2-Day Shipping $12.00
  <button type='submit' name='addOrder-submit'>Order</button>
 </form>";
}
 ?>
