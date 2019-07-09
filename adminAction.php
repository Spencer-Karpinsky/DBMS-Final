<?php
require 'connect.php';
$test = "";
if (isset($_GET['checkStock-submit'])) {
  require 'connect.php';
  $sql ="SELECT Product_Name, Quantity, Product_ID FROM Product";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result)){
    $pName =$row['Product_Name'];
    $quantity=$row['Quantity'];
    $pID=$row['Product_ID'];
    $test .= "
    <table class='echoTable'>
    <thead>
      <tr>
      <th colspan='2'>$pName</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>Product ID:</td>
      <td>$pID</td>
    </tr>
      <tr>
        <td>Quantity:</td>
        <td>$quantity</td>
      </tr>
    </table>
    ";
  }

}
elseif (isset($_POST['newProduct-submit'])) {
  $sql="INSERT INTO Product (Product_Name, Manufacture, Quantity,Price,Description)
  VALUES
  ('$_POST[newProductName]','$_POST[newManufacture]','$_POST[newQuantity]','$_POST[newPrice]','$_POST[newDescription]')";
  $conn->query($sql);
  header("Location: ../admin.php");
}

elseif (isset($_POST['modProduct-submit'])) {
  $sql="UPDATE Product
   SET Product_Name = '$_POST[modProductName]', Manufacture = '$_POST[modManufacture]', Quantity = '$_POST[modQuantity]', Price = '$_POST[modPrice]', Description = '$_POST[modDescription]'
   WHERE Product_ID = $_POST[modProductID]";
  $conn->query($sql);
  header("Location: ../admin.php");
}

elseif (isset($_POST['deleteProduct-submit'])) {
  $sql="DELETE FROM Product WHERE Product_ID = $_POST[deleteProductID]";
  $conn->query($sql);
  header("Location: ../admin.php");
}

elseif (isset($_POST['updateStock-submit'])) {
  $sql="UPDATE Product SET Quantity = '$_POST[updateStockQuantity]' WHERE Product_ID = $_POST[updateStockProductID]";
  $conn->query($sql);
  header("Location: ../admin.php");
}



elseif (isset($_POST['newAdmin-submit'])) {
  $sql="INSERT INTO Admin (AdminUserID)
  VALUES
  ('$_POST[newAdmin]')";
  $conn->query($sql);
  header("Location: ../admin.php");
}
?>
