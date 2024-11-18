<?php
Utils\ensure_logged_in_as_admin();
?>

<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">
                Orders
                <span class="badge badge-soft-dark ml-2">
                    <?php if (isset($data)) {
                        echo mysqli_num_rows($data["orders"]);
                    } ?>
                </span>
            </h1>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-borderless card-table">
            <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Address</th>
                <th colspan="2">Note</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_array($data["orders"])) {
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["customer_id"] ?></td>
                    <td><?php echo $row["order_date"] ?></td>
                    <td><?php echo $row["total"] ?></td>
                    <td><?php echo $row["address"] ?></td>
                    <td><?php echo $row["note"] ?></td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

