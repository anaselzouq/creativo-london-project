<a class="btn btn-primary " href="?action=add" style="margin-bottom: 20px;">Add User</a>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "functions/connect.php";
        $read = "SELECT * FROM categories";
        $query = $conn->query($read);
        foreach ($query as $cat):
        ?>
            <tr class="text-center">
                <td><?= $cat['id'] ?></td>
                <td><?= $cat['name'] ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?action=edit&id=<?= $cat["id"] ?>">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $cat["id"] ?>">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="e<?= $cat["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    are you sure you want to delete <?= $cat['name'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger" href="functions/categories/delete_cat.php?id=<?= $cat["id"] ?>">Confirm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>