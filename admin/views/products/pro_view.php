<a class="btn btn-primary " href="?action=add" style="margin-bottom: 20px;">Add product</a>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>sale</th>
            <th>stock</th>
            <th>description</th>
            <th>category</th>
            <th>controls</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "functions/connect.php";
        $read = "SELECT * FROM products";
        $query = $conn->query($read);
        foreach ($query as $product):
        ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['sale'] ?></td>
                <td><?= $product['stock'] ?></td>
                <td><?= $product['description'] ?></td>
                <td>
                    <?php
                    $id_pro = $product['id'];

                    $read_image = "SELECT * FROM images WHERE id_pro = $id_pro";
                    $query_image = $conn->query($read_image);

                    while ($img = $query_image->fetch_assoc()) {
                        echo "<img src='images/{$img['name']}' style='width:100px; margin:5px'>";
                    }
                    ?>
                </td>

                <td><?php
                    $cat_id = $product['cat_id'];
                    $readCat = "SELECT name FROM categories WHERE id = $cat_id";
                    $queryCat = $conn->query($readCat);
                    $category = $queryCat->fetch_assoc();
                    echo $category['name'];
                    ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?action=edit&id=<?= $product["id"] ?>">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#e<?= $product["id"] ?>">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="e<?= $product["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    are you sure you want to delete <?= $product['name'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-danger" href="functions/products/delete_pro.php?id=<?= $product["id"] ?>">Confirm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>