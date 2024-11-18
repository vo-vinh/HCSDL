<?php
Utils\ensure_logged_in_as_admin();
?>

<style>
    #add-category-link {
        background-color: #F84E45;
        text-decoration: none;
        color: white;
        border: 1px solid white;
        padding: 10px;
        border-radius: 5px;
    }
</style>
<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">
                Categories
                <span class="badge badge-soft-dark ml-2">
                    <?php
                    if (isset($data)) {
                        echo mysqli_num_rows($data["categories"]);
                    }
                    ?>
                </span>
            </h1>
        </div>
        <div class="col-sm-auto">
            <a href="<?php echo Utils\BASE_URL ?>/Category/new" id="add-category-link">
                Add Category
            </a>
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
                <th colspan="2"></th>
            </tr>
            </thead>

            <tbody>
            <?php
            while ($row = mysqli_fetch_array($data["categories"])) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["id"] ?>
                    </td>
                    <td>
                        <?php echo $row["name"] ?>
                    </td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/Category/edit/<?php echo $row["id"] ?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/Category/delete/<?php echo $row["id"] ?>">
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

