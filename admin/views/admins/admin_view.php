<a class="btn btn-primary " href="?action=add" style="margin-bottom: 20px;">Add User</a>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>password</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "functions/connect.php";
        $read = "SELECT * FROM admins";
        $query = $conn->query($read);
        foreach ($query as $admin):
        ?>
            <tr>
                <td><?= $admin['id'] ?></td>
                <td><?= $admin['username'] ?></td>
                <td><?= $admin['email'] ?></td>
                <td><?= $admin['password'] ?></td>
                <td><?php
                    $priv_id = $admin['priv_id'];
                    $read = "SELECT * FROM privliges WHERE priv = $priv_id";
                    $query = $conn -> query($read);
                    $privliges = $query->fetch_assoc();
                    echo $privliges['name'];
                    ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?action=edit&id=<?= $admin["id"] ?>"  style="
                    <?php if ($admin['priv_id'] > $_SESSION['priv_id']) {
                            echo "display: none;";
                    } ?>">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $admin["id"] ?>" style="
                    <?php if ($admin['priv_id'] == $_SESSION['priv_id'] || $admin['priv_id'] > $_SESSION['priv_id']) {
                            echo "display: none;";
                    } ?>">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="e<?= $admin["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    are you sure you want to delete <?= $admin['username'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger" href="functions/admins/delete_admin.php?id=<?= $admin["id"] ?>">Confirm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>