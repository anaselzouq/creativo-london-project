<?php

include "functions/connect.php";
$id = $_GET["id"];
$edit = "SELECT * FROM products WHERE id = $id";
$query = $conn->query($edit);
$product = $query->fetch_assoc();

?>

<form action="functions/products/update_pro.php" method="post" enctype="multipart/form-data">
  <!-- id -->
  <input type="hidden" name="id" value="<?= $product["id"] ?>">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" value="<?= $product["name"] ?>" class="form-control" id="name">
    <div>
            <?php
            if (isset($_SESSION['error_name'])) {
                echo $_SESSION["error_name"];
                unset($_SESSION['error_name']);
            }

            ?>
        </div>
  </div>

  <div class="form-group">
    <label for="price">price</label>
    <input type="number" name="price" value="<?= $product["price"] ?>" class="form-control" id="price">
    <div>
            <?php
            if (isset($_SESSION['error_price'])) {
                echo $_SESSION["error_price"];
                unset($_SESSION['error_price']);
            }

            ?>
        </div>
  </div>

  <div class="form-group">
    <label for="sale">sale</label>
    <input type="number" name="sale" value="<?= $product["sale"] ?>" class="form-control" id="sale">
    <div>
            <?php
            if (isset($_SESSION['error_sale'])) {
                echo $_SESSION["error_sale"];
                unset($_SESSION['error_sale']);
            }
            ?>
        </div>
  </div>

  <div class="form-group">
    <label for="sale">stock</label>
    <input type="number" name="stock" value="<?= $product["stock"] ?>" class="form-control" id="stock">
    <div>
            <?php
            if (isset($_SESSION['error_stock'])) {
                echo $_SESSION["error_stock"];
                unset($_SESSION['error_stock']);
            }

            ?>
        </div>
  </div>

  <div class="form-group">
    <label for="img">img</label>
    <input type="file" name="img[]" multiple value="" class="form-control" id="img">
    <div>
            <?php
            if (isset($_SESSION['error_img'])) {
                echo $_SESSION["error_img"];
                unset($_SESSION['error_img']);
            }

            ?>
        </div>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Categories</label>
    <select name="cat" class="form-control" id="exampleFormControlSelect1">
      <?php
      include "functions/connect.php";
      $readCat = "SELECT * FROM categories";
      $queryCat = $conn->query($readCat);
      foreach ($queryCat as $category):
      ?>
        <option value="<?= $category['id'] ?>" <?= $category["id"] == $product["cat_id"] ? "selected" : "" ?>><?= $category['name'] ?></option>

      <?php endforeach;  ?>

    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>