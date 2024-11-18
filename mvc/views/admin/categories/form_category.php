<?php
Utils\ensure_logged_in_as_admin();
?>

<div class="card">
    <div class="card-body">
        <?php
        if (isset($data) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $redirect_link = Utils\BASE_URL . "/Category/index";
            if (!isset($data["id"])) {
                if ($data["category_model"]->add_category($name)) {
                    Utils\redirect_with_message($redirect_link, "Thêm category thành công");
                } else {
                    Utils\redirect_with_message($redirect_link, "Thêm category thất bại");
                }
            } else {
                if ($data["category_model"]->update_category($id, $name)) {
                    Utils\redirect_with_message($redirect_link, "Cập nhật category thành công");
                } else {
                    Utils\redirect_with_message($redirect_link, "Cập nhật category thất bại");
                }
            }
        }
        ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="idInput" class="form-label">ID</label>
                <input type="number"
                       id="idInput"
                       name="id"
                       class="form-control"
                       placeholder="Please input id"
                       value="<?php
                       if (isset($data["id"])) {
                           echo $data["id"];
                       }
                       ?>"
                       required
                />
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text"
                       id="nameInput"
                       name="name"
                       class="form-control"
                       placeholder="Please input name"
                       value="<?php
                       if (isset($data["category"]))
                           echo mysqli_fetch_assoc($data["category"])["name"]
                       ?>"
                       required>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" value="Save changes" class="btn btn-primary">
            </div>
        </form>

    </div>
</div>