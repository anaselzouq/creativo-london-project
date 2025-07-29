<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../categories.php');
  exit();
}

session_start();

include "../connect.php";

extract($_POST);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"] ?? "");


  if (empty($name)) {
    $_SESSION["error_name"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the Categorie name.</div>";
    header("location: ../../categories.php?action=add");
    exit();
  }
}

$insert = "INSERT INTO categories 
  (name)
  VALUE
  ('$name')
";

$query = $conn->query($insert);

if ($query) {
  header('location: ../../categories.php');
}
