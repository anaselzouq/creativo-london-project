<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../users.php');
  exit();
}

include "../connect.php";

extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["username"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $address = trim($_POST["address"] ?? "");
  $password = trim($_POST["password"] ?? "");

  if (empty($name)) {
    $_SESSION["error_name"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter your name.</div>";
    header("location: ../../users.php?action=add");
    exit();
  } elseif (empty($email)) {
    $_SESSION["error_email"] ="<div class='alert alert-danger ' style='margin-top: 10px;'>Please enter your email</div>";
    header("location: ../../users.php?action=add");
    exit();
  } elseif (empty($address)) {
    $_SESSION["error_address"] ="<div class='alert alert-danger' style='margin-top: 10px;'>Please enter your address</div>";
    header("location: ../../users.php?action=add");
    exit();
  } elseif (empty($password)) {
    $_SESSION["error_password"] =  "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter your password</div>";
    header("location: ../../users.php?action=add");
    exit();
  }
}

$insert = "INSERT INTO users 
  (username , email , address , password)
  VALUE
  ('$username' , '$email' , '$address' , md5('$password'))
";

$query = $conn->query($insert);

if ($query) {
  header('location: ../../users.php');
}
