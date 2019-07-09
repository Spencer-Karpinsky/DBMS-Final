<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "0735";
$db = "marketplace";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}
