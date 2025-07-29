
<form action="functions/products/insert_pro.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" value="<?php if (isset($_SESSION["name"])) {
            echo $_SESSION["name"];unset($_SESSION["name"]);} ?>" class="form-control mb-3" id="name">
        <div>
            <?php
            if (isset($_SESSION["errors"]["name"])) {
                echo $_SESSION["errors"]["name"];
                unset($_SESSION["errors"]["name"]);
            }

            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="price">price</label>
        <input type="number" name="price" value="<?php if (isset($_SESSION["price"])) {
            echo $_SESSION["price"];unset($_SESSION["price"]);} ?>" class="form-control" id="price">
        <div>
            <?php
            if (isset($_SESSION['errors']['price'])) {
                echo $_SESSION['errors']['price'];
                unset($_SESSION['errors']['price']);
            }

            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="sale">sale</label>
        <input type="number" name="sale" value="<?php if (isset($_SESSION["sale"])) {
            echo $_SESSION["sale"];unset($_SESSION["sale"]);} ?>" class="form-control" id="sale">
        <div>
            <?php
            if (isset($_SESSION['errors']['sale'])) {
                echo $_SESSION["errors"]["sale"];
                unset($_SESSION["errors"]["sale"]);
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="sale">stock</label>
        <input type="number" name="stock" value="<?php if (isset($_SESSION["stock"])) {
            echo $_SESSION["stock"];
            unset($_SESSION["stock"]);} ?>" class="form-control" id="stock">
        <div>
            <?php
            if (isset($_SESSION['errors']['stock'])) {
                echo $_SESSION["errors"]["stock"];
                unset($_SESSION["errors"]["stock"]);
            }

            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="img">img</label>
        <input type="file" name="img[]" multiple value="" class="form-control" id="img">
        <div>
            <?php
            if (isset($_SESSION['errors']['img'])) {
                echo $_SESSION["errors"]["img"] ;
                unset($_SESSION["errors"]["img"]);
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
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

            <?php endforeach;  ?>

        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>