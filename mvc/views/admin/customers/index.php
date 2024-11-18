<?php
Utils\ensure_logged_in_as_admin();
?>

<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">
                Customers
                <span class="badge badge-soft-dark ml-2">
                    <?php
                    if (isset($data)) {
                        echo mysqli_num_rows($data["customers"]);
                    }
                    ?>
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
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                <th colspan="2"></th>
            </tr>
            </thead>

            <tbody>
            <?php
            while ($row = mysqli_fetch_array($data["customers"])) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $row["id"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row["name"];
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/customer/edit/<?php echo $row["id"] ?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/customer/delete/<?php echo $row["id"] ?>">
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

