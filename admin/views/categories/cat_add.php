<form action="functions/categories/insert_cat.php" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" value="" class="form-control" id="name">
        <div>
            <?php
            if (isset($_SESSION['error_name'])) {
                echo $_SESSION["error_name"];
                unset($_SESSION['error_name']);
            }

            ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>