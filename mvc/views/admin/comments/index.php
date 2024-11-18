<?php
Utils\ensure_logged_in_as_admin();
?>

<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">
                Comments<span class="badge badge-soft-dark ml-2"><?php
                    if (isset($data)) {
                        echo mysqli_num_rows($data["comments"]);
                    }
                    ?></span>
            </h1>
        </div>

    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-borderless card-table">
            <thead class="thead-light">
            <tr>
                <th>Product_ID</th>
                <th>Customer_ID</th>
                <th>Time</th>
                <th>Comment</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_array($data["comments"])) {
                ?>
                <tr>
                    <td><?php echo $row["product_id"] ?></td>
                    <td><?php echo $row["customer_id"] ?></td>
                    <td><?php echo $row["created_at"] ?></td>
                    <td><?php echo $row["content"] ?></td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/Comment/delete/<?php echo $row["product_id"] . "/" . $row["customer_id"] ?>">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

