<?php
  require "header.php";
  require "includes/itemsearch.php";
?>

<main>

<form class="form-signup" method="get">
  <input type="text" name="item" placeholder="Search for an item...">
  <br><br>
  <button type="submit" name="search-submit">Search</button>
</form>
<?php echo isset($_GET['search-submit']) ? $output : '' ?>
</main>



<?php
  require "footer.php";
?>
