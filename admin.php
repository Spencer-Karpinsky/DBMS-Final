<?php
  require "header.php";
  require "includes/adminAction.php";
?>

<main>
  <h1>Add Product</h1>
<form class="form-signup" action="includes/adminAction.php" method="post">
  <input type="text" name="newProductName" placeholder="Product Name" required>
  <input type="text" name="newManufacture" placeholder="Manufacture" required>
  <input type="text" name="newQuantity" placeholder="Quantity" required>
  <input type="text" name="newPrice" placeholder="Price" required>
  <input type="text" name="newDescription" placeholder="Desciption" required>
  <button type="submit" name="newProduct-submit">Add New Product</button>
</form>
<h1>Modify Product</h1>
<form class="form-signup" action="includes/adminAction.php" method="post">
  <input type="text" name="modProductID" placeholder="Product ID" required>
  <input type="text" name="modProductName" placeholder="Product Name" required>
  <input type="text" name="modManufacture" placeholder="Manufacture" required>
  <input type="text" name="modQuantity" placeholder="Quantity" required>
  <input type="text" name="modPrice" placeholder="Price" required>
  <input type="text" name="modDescription" placeholder="Desciption" required>
  <button type="submit" name="modProduct-submit">Modify Product</button>
</form>
<h1>Delete Product</h1>
<form class="form-signup" action="includes/adminAction.php" method="post">
  <input type="text" name="deleteProductID" placeholder="Product ID" required>
  <button type="submit" name="deleteProduct-submit">Delete</button>
</form>
<br />
<h1>Add New Admin</h1>
<form class="form-signup" action="includes/adminAction.php" method="post">
  <input type="text" name="newAdmin" placeholder="Enter Admin Username" required>
  <button type="submit" name="newAdmin-submit">Add New Admin</button>
</form>
<h1>Update Product Stock</h1>
<form class="form-signup" action="includes/adminAction.php" method="post">
  <input type="text" name="updateStockProductID" placeholder="Product ID" required>
  <input type="text" name="updateStockQuantity" placeholder="Quantity" required>
  <button type="submit" name="updateStock-submit">Update Stock</button>
</form>
<form class="form-signup" method="get">
  <button type="submit" name="checkStock-submit">Check Product Stock</button>
</form>
<?php echo isset($_GET['checkStock-submit']) ? $test : '' ?>

</main>

<?php
  require "footer.php";
?>
