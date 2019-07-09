<?php
  session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav class="nav-header-main">
        <ul>
          <li><a href="index.php">Home</a> </li>
          <?php
          if (isset($_SESSION['logedIn'])) {
          echo"<li><a href='store.php'>Store</a> </li>";
          echo"<li><a href='Orders.php'>Orders</a> </li>";
        }
          if (isset($_SESSION['Admin'])) {
            echo "<li><a href='admin.php'>Admin</a> </li>";
          }
        ?>
        </ul>
        <div class="header-login">
          <?php
          if (isset($_SESSION['logedIn'])) {
            echo '<form action="includes/logout.php" method="post">
              <button type="submit" name="logout-submit">Logout</button>
            </form>';
            echo '<form action="cart.php" method="get">
              <button type="submit" name="cart-submit">Cart</button>
            </form>';
          }
          else {
            echo '<form action="includes/login.php" method="post">
              <input type="text" name="userId" placeholder="userId/Email">
              <input type="password" name="password" placeholder="password">
              <button type="submit" name="login-submit">Login</button>
            </form>
            <a href="signup.php" class="header-signup">Signup</a>';
          }
           ?>
        </div>
      </nav>
    </header>
  </body>
</html>
