<?php
require 'connect.php';
session_start();
session_unset();
session_destroy();
if (isset($_POST['logout-submit'])) {
  $sql="TRUNCATE Table Cart";
  mysqli_query($conn,$sql);
}
header("Location: ../index.php");
