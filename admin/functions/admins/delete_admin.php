<?php

include "../connect.php";

$id = $_GET['id'];

$del = "DELETE FROM admins WHERE id = $id";

$query = $conn->query($del);

if ($query) {
  header("location: ../../admins.php");
}