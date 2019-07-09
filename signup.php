<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="section-default">
    <h1>Signup</h1>
    <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
          echo '<p class="signuperror"> Fill in all fields.</p>';
        }
        elseif ($_GET['error'] == "invalidnewUserIdmail") {
          echo '<p class="signuperror"> Invalid User name and email</p>';
        }
        elseif ($_GET['error'] == "invalidnewUserId&mail") {
          echo '<p class="signuperror"> Username Taken</p>';
        }
        elseif ($_GET['error'] == "invalidmail&newUserId&mail") {
          echo '<p class="signuperror"> Email already used</p>';
        }
        elseif ($_GET['error'] == "passwordcheck&newUserId") {
          echo '<p class="signuperror"> Passwords do not match</p>';
        }
      }
      elseif (isset($_GET['signup'])) {
        if ($_GET['signup'] == "success") {
          echo '<p class="signupsuccess"> Successful signup</p>';
        }
      }
     ?>
      <form class="form-signup" action="includes/signupsheet.php" method="post">
        <input type="text" name="newUserId" placeholder="User Name">
        <input type="text" name="userFname" placeholder="First Name">
        <input type="text" name="userLname" placeholder="Last Name">
        <input type="text" name="userPhoneNum" placeholder="Phone Number">
        <input type="text" name="userAddress" placeholder="Address">
        <input type="text" name="mail" placeholder="Email">
        <input type="password" name="newPassword" placeholder="Password">
        <input type="password" name="password-repeat" placeholder="Repeat Password">
        <button type="submit" name="signup-submit">Signup</button>
      </form>
    </section>
  </div>
  </main>
<?php
  require "footer.php";
?>
