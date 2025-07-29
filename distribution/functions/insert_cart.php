<?php
session_start();
include "connect.php";

parse_str($_SERVER["QUERY_STRING"], $params);

$pro_id = $params['id'];
$_SESSION["pro_id"] = $pro_id;
$user_id = $_SESSION["login"];

$insert_cart = "INSERT INTO cart
  (pro_id,user_id,quantits)
  VALUE
  ('$pro_id','$user_id','1')
";


$query = $conn->query($insert_cart);
if (!$query) {
  echo "Error in inserting product: " . $conn->error;
  exit();
} else {
  header("location: ../cart.php");
}
