<?php

include "functions/connect.php";
$id = $_GET["id"];
$edit = "SELECT * FROM admins WHERE id = $id";
$query = $conn->query($edit);
$admin = $query->fetch_assoc();

?>

<form action="functions/admins/update_admin.php" method="post">
  <!-- id -->
  <input type="hidden" name="id" value="<?= $admin["id"]?>">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="username" value="<?= $admin["username"] ?>" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" name="email" value="<?= $admin["email"] ?>" class="form-control" id="email">
  </div>


  <div class="form-group">
    <label for="pass">password</label>
    <input type="password" name="pass" value="<?= $admin["password"] ?>" class="form-control" id="pass">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>