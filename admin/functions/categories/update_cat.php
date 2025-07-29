<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../categories.php');
  exit();
}

extract($_POST);

include "../connect.php";

$update = "UPDATE categories SET
                name = '$name'
            WHERE id = $id"
;

$query = $conn->query($update);

if ($query) {
  header("location: ../../categories.php");
} else {
  echo $conn->error;
}