<?php

include "../connect.php";

$id = $_GET['id'];

$del = "DELETE FROM products WHERE id = $id";

$query = $conn->query($del);

if ($query) {
  header("location: ../../products.php");
}
