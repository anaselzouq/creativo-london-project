<?php

include "functions/connect.php";
$id = $_GET["id"];
$edit = "SELECT * FROM users WHERE id = $id";
$query = $conn->query($edit);
$cat = $query->fetch_assoc();

?>

<form action="functions/categories/update_cat.php" method="post">
  <!-- id -->
  <input type="hidden" name="id" value="<?= $cat["id"]?>">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" value="<?= $cat["name"] ?>" class="form-control" id="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>