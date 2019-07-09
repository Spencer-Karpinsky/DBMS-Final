<?php

if (isset($_GET['cart-submit'])) {
  require 'connect.php';
  $output = "";
  $cartPrice = 0;

  $sql = "SELECT * FROM Cart";
  $result=mysqli_query($conn,$sql);
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt==0){
    $output ="<h1>Your Cart is empty</h1>";
  }
  while($row=mysqli_fetch_array($result)){
    $pName =$row['Product_Name'];
    $price=$row['Price'];
    $cartPrice = $cartPrice + $price;
    $output .= "
      <form action='includes/removeFromCart.php' method='post'>
        <table class='echoTable'>
        <thead>
        <tr>
          <th colspan='2'>$pName</th>
          <input type='hidden' name='Product' value=$pName />
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Price</td>
          <td>$$price</td>
          <input type='hidden' name='Price' value=$price/>
        </tr>
        <tr>
          <td><button type='submit' name='removefromcart-submit'>Remove from Cart</button></td>
        </tr>
        </tbody>
        </table>
      </form>";
    }
}



 ?>
