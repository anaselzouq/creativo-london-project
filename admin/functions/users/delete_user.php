<?php

include "../connect.php";

$id = $_GET['id'];

$del = "DELETE FROM users WHERE id = $id";

$query = $conn->query($del);

if ($query) {
  header("location: ../../users.php");
}