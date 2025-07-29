<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../admins.php');
  exit();
}

extract($_POST);

include "../connect.php";

$update = "UPDATE admins SET
                username = '$username',
                email = '$email',
                password = '$pass'
            WHERE id = $id"
;

$query = $conn->query($update);

if ($query) {
  header("location: ../../admins.php");
} else {
  echo $conn->error;
}