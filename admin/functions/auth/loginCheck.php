<?php
session_start();

$username = $_POST['username'];
$password = md5($_POST["password"]);

include "../connect.php";

$read = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";

$query = $conn->query($read);

if ($query->num_rows > 0) {
  $user = $query->fetch_assoc();
  $_SESSION["login"] = $user["id"];
  $_SESSION['priv_id'] = $user["priv_id"];
  if (isset($_SESSION["url"])) {
    $url = $_SESSION["url"];
    header("location: http://localhost$url");
  } else {
    header("location: ../../index.php");
  }
} else {
  $_SESSION["error"] = "<div class='alert alert-danger'>wrong credentials</div>";
  header("location: ../../login.php");
}
