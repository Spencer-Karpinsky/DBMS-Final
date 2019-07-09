<?php
    if (isset($_GET['search-submit'])) {
      require 'connect.php';


      $item = $_GET['item'];
      $output = "";

      $sql = "SELECT * FROM Product WHERE Product_Name LIKE '%$item%' OR Manufacture LIKE '%$item%' ORDER BY Product_Name DESC";

      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result)){
        $pName =$row['Product_Name'];
        $manufacture=$row['Manufacture'];
        $quantity=$row['Quantity'];
        $price=$row['Price'];
        $description=$row['Description'];
        if ($quantity !=0 && isset($_SESSION['logedIn'])) {
          $output .=
          "<form action='includes/addCart.php' method='post'>
          <table class='echoTable'>
          <thead>
            <tr>
            <th colspan='2'>$pName</th>
            <input type='hidden' name='Product' value=$pName />
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Manufacture:</td>
              <td>$manufacture</td>
            </tr>
            <tr>
              <td>Stock</td>
              <td>$quantity</td>
          </tr>
          <tr>
              <td>Price</td>
              <td>$$price</td>
              <input type='hidden' name='Price' value=$price/>
          </tr>
          <tr>
            <td>Description</td>
            <td>$description</td>
          </tr>
          <tr>
            <td><button type='submit' name='addCart-submit'>Add to Cart</button></td>
          </tr>
          </tbody>
          </table>
        </form>";
      }
      else {
        $output .="
        <table class='echoTable'>
        <thead>
          <tr>
          <th colspan='2'>$pName</th>
          <input type='hidden' name='Product' value=$pName />
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Manufacture:</td>
            <td>$manufacture</td>
          </tr>
          <tr>
            <td>Out of Stock!</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>$$price</td>
            <input type='hidden' name='Price' value=$price/>
        </tr>
        <tr>
          <td>Description</td>
          <td>$description</td>
        </tr>
        </tbody>
        </table>";
     }
   }
 }


?>
