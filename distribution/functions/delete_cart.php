<?php

include "connect.php";
session_start();

parse_str($_SERVER["QUERY_STRING"], $params);

$cart_id = $params['id'];

$del = "DELETE FROM cart WHERE cart_id = $cart_id";

$query = $conn->query($del);

header("location: ../cart.php");

