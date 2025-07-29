<?php

include "../connect.php";

$id = $_GET['id'];

$del = "DELETE FROM categories WHERE id = $id";

$query = $conn->query($del);

if ($query) {
  header("location: ../../categories.php");
}