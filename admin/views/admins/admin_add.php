<form action="functions/admins/insert_admin.php" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="name">name</label>
        <input type="text" name="username" value="" class="form-control" id="name">
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
        <label for="email">email</label>
        <input type="email" name="email" value="" class="form-control" id="email">
        <div>
            <?php
            if (isset($_SESSION['error_email'])) {
                echo $_SESSION["error_email"];
                unset($_SESSION['error_email']);
            }

            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" value="" class="form-control" id="password">
        <div>
            <?php
            if (isset($_SESSION['error_password'])) {
                echo $_SESSION["error_password"];
                unset($_SESSION['error_password']);
            }

            ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>