<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <?php
          if (isset($_SESSION['logedIn'])) {
            echo "<h1>Welcome!<br /> Head over to the store and make a purchase</h1>";
          }
          else {
            echo '<h1>Please signup or login to purchase items</h1> <br /> <h3> Checkout the store</h3>
            <form action="store.php">
              <button type="submit">Go to Store</button>
            </form>';
          }
         ?>
  </section>
  </div>
  </main>
<?php
  require "footer.php";
?>
