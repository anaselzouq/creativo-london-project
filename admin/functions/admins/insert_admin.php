<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../admins.php');
  exit();
}

include "../connect.php";

extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["username"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $password = trim($_POST["password"] ?? "");


  if (empty($name)) {
    $_SESSION["error_name"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter your name.</div>";
    header("location: ../../admins.php?action=add");
    exit();
  } elseif (empty($email)) {
    $_SESSION["error_email"] ="<div class='alert alert-danger ' style='margin-top: 10px;'>Please enter your email.</div>";
    header("location: ../../admins.php?action=add");
    exit();
  } elseif (empty($password)) {
    $_SESSION["error_password"] ="<div class='alert alert-danger' style='margin-top: 10px;'>Please enter your password</div>";
    header("location: ../../admins.php?action=add");
    exit();
  }
}

$insert = "INSERT INTO admins 
  (username , email , password)
  VALUE
  ('$username' , '$email' , md5('$password'))
";

$query = $conn->query($insert);

if ($query) {
  header('location: ../../admins.php');
}
