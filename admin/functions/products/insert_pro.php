<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../products.php');
  exit();
}

include "../connect.php";

extract($_POST);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];
  $name = trim($_POST["name"] ?? "");
  $price = trim($_POST["price"] ?? "");
  $sale = trim($_POST["sale"] ?? "");
  $stock = trim($_POST["stock"] ?? "");
  $img = trim($_POST["img[]"] ?? "");

  $_SESSION["name"] = $name;
  $_SESSION["price"] = $price;
  $_SESSION['sale'] = $sale;
  $_SESSION["stock"] = $stock;

  if (empty($name)) {
    $errors["name"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the product name.</div>";
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=add");
    exit();
  } elseif (empty($price)) {
    $errors["price"] = "<div class='alert alert-danger ' style='margin-top: 10px;'>Please enter the product price.</div>";
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=add");
    exit();
  } elseif (empty($sale)) {
    $errors["sale"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the product sale.</div>";
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=add");
    exit();
  } elseif (empty($stock)) {
    $errors["stock"] =  "<div class='alert alert-danger' style='margin-top: 10px;'>Please purchase stock products.</div>";
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=add");
    exit();
  } elseif ($_FILES['img']["error"][0] !== 0) {
    $errors["img"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the product image.</div>";
    $_SESSION["errors"] = $errors;
    header("location: ../../products.php?action=add");
    exit();
  }

}

$imageNames = [];

if (isset($_FILES['img'])) {
  $count = count($_FILES['img']['name']);
  $extensions = ["jpg", "png", "gif", "jpeg"];

  for ($i = 0; $i < $count; $i++) {
    if ($_FILES['img']['error'][$i] == 0) {
      $imgName = $_FILES['img']['name'][$i];
      $temp = $_FILES['img']['tmp_name'][$i];
      $ext = pathinfo($imgName, PATHINFO_EXTENSION);

      if (in_array($ext, $extensions)) {
        if ($_FILES['img']['size'][$i] <= 2000000) {
          $newName = md5(uniqid()) . '.' . $ext;
          move_uploaded_file($temp, "../../images/" . $newName);
          $imageNames[] = $newName;
        } else {
          echo "File " . $imgName . " is too big<br>";
          exit();
        }
      } else {
        echo "Wrong file extension in " . $imgName . "<br>";
        exit();
      }
    } else {
      echo "Error in uploading " . $_FILES['img']['name'][$i] . "<br>";
      exit();
    }
  }
}


$insert = "INSERT INTO products 
(name , price , sale , stock , description , cat_id)
VALUE
('$name' , '$price' , '$sale' , '$stock' , 'any description' , '$cat')
";

$query = $conn->query($insert);
if (!$query) {
  echo "Error in inserting product: " . $conn->error;
  exit();
}

$last_pro_id = $conn->insert_id;

foreach ($imageNames as $img) {
  $conn->query("INSERT INTO images (name, id_pro) VALUES ('$img', $last_pro_id)");
}

header('location: ../../products.php');
