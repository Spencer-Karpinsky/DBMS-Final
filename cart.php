<?php
  require "header.php";
  require "includes/showcart.php";
  require "includes/orderItems.php";
  require "includes/connect.php";
  $sql = 'SELECT count(*) From Cart';
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $count = $row['count(*)'];
 ?>

<main>
  <h1>Your Cart</h1>
  <div id="centertables">
  <?php
  if ($count != 0) {
    echo isset($_GET['cart-submit']) ? $output : '';
  }
  else {
    echo "<h1>Empty! Add something to your cart</h1>";
  }
  ?>
  </div>
  <?php
  if ($count != 0) {
  echo "<h1>Your Cart Total is: $$cartPrice</h1>";
}
  ?>
  <?php
  if ($count != 0) {
  echo "<h1 id='orderText'>Place your order</h1>";
  echo isset($_GET['cart-submit']) ? $orderForm : '';
}
  ?>
</main>

<?php
  require "footer.php";
?>
