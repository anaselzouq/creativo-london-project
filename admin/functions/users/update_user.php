<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../users.php');
  exit();
}

extract($_POST);

include "../connect.php";

$update = "UPDATE users SET
                username = '$username',
                email = '$email',
                address = '$address',
                password = '$pass'
            WHERE id = $id"
;

$query = $conn->query($update);

if ($query) {
  header("location: ../../users.php");
} else {
  echo $conn->error;
}