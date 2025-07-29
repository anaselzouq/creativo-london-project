<?php

session_start();
include "../connect.php";

extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"] ?? "");
  $price = trim($_POST["price"] ?? "");
  $sale = trim($_POST["sale"] ?? "");
  $stock = trim($_POST["stock"] ?? "");
  $img = trim($_POST["img[]"] ?? "");

  if (empty($name)) {
    $_SESSION["error_name"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the product name.</div>";
    header("location: ../../products.php?action=edit&id=$id");
    exit();
  } elseif (empty($price)) {
    $_SESSION["error_price"] = "<div class='alert alert-danger ' style='margin-top: 10px;'>Please enter the product price.</div>";
    header("location: ../../products.php?action=edit&id=$id");
    exit();
  } elseif (empty($sale)) {
    $_SESSION["error_sale"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the product sale.</div>";
    header("location: ../../products.php?action=edit&id=$id");
    exit();
  } elseif (empty($stock)) {
    $_SESSION["error_stock"] =  "<div class='alert alert-danger' style='margin-top: 10px;'>Please purchase stock products.</div>";
    header("location: ../../products.php?action=edit&id=$id");
    exit();
  } elseif ($_FILES['img']["error"][0] !== 0) {
    $_SESSION["error_img"] = "<div class='alert alert-danger' style='margin-top: 10px;'>Please enter the product image.</div>";
    header("location: ../../products.php?action=edit&id=$id");
    exit();
  }
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header('location: ../../products.php');
  exit();
}

$update = "UPDATE products SET
                name = '$name',
                price = '$price',
                sale = '$sale',
                stock = '$stock',
                cat_id = '$cat' 
            WHERE id = $id";

$query = $conn->query($update);

$idDel = $_POST["id"];

$del = "DELETE FROM images WHERE id_pro = $idDel";

$queryDel = $conn->query($del);

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

foreach ($imageNames as $img) {
  $conn->query("INSERT INTO images (name, id_pro) VALUES ('$img', $id)");
}

if ($query) {
  header("location: ../../products.php");
} else {
  echo $conn->error;
}
