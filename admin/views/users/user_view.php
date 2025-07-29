<a class="btn btn-primary " href="?action=add" style="margin-bottom: 20px;">Add User</a>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>address</th>
            <th>email</th>
            <th>password</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "functions/connect.php";
        $read = "SELECT * FROM users";
        $query = $conn->query($read);
        foreach ($query as $user):
        ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['address'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?action=edit&id=<?= $user["id"] ?>">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $user["id"] ?>">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="e<?= $user["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    are you sure you want to delete <?= $user['username'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger" href="functions/users/delete_user.php?id=<?= $user["id"] ?>">Confirm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>