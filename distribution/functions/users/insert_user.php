<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../register.php');
  exit();
}

include "../connect.php";

extract($_POST);

$username = "$firstName $lastName";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"] ?? "");
    $lastName = trim($_POST["lastName"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $password = trim($_POST["passwordOne"] ?? "");
    $confirmPassword = trim($_POST["repeatPassword"] ?? "");

    // التحقق من أن جميع الحقول ممتلئة
    if (empty($firstName) || empty($lastName) || empty($email) || empty($address) || empty($password) || empty($confirmPassword)) {
      $_SESSION["error"] = "<div class='alert alert-danger'>All fields must be filled in!</div>";
      header("location: ../../register.php");
      exit();
    } elseif ($password !== $confirmPassword) {
      $_SESSION["error"] = "<div class='alert alert-danger'>Password does not match</div>";
      header("location: ../../register.php");
      exit();
    } else {
      $password = $passwordOne;
    }
}

$insert = "INSERT INTO users 
  (username , email , address , password)
  VALUE
  ('$username' , '$email' , '$address' , md5('$password'))
";

$query = $conn->query($insert);

if ($query) {
  header('location: ../../login.php');
}
