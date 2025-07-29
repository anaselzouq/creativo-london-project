<?php

include "functions/connect.php";
$id = $_GET["id"];
$edit = "SELECT * FROM users WHERE id = $id";
$query = $conn->query($edit);
$user = $query->fetch_assoc();

?>

<form action="functions/users/update_user.php" method="post">
  <!-- id -->
  <input type="hidden" name="id" value="<?= $user["id"]?>">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="username" value="<?= $user["username"] ?>" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" name="email" value="<?= $user["email"] ?>" class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="address">address</label>
    <input type="text" name="address" value="<?= $user["address"] ?>" class="form-control" id="address">
  </div>

  <div class="form-group">
    <label for="pass">password</label>
    <input type="password" name="pass" value="<?= $user["password"] ?>" class="form-control" id="pass">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>