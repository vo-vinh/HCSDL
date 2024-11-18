<div class="card">
    <div class="card-body">
        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $category_id = $_POST['category_id'] ?? 0;
            $name = $_POST['name'] ?? "";
            $qty = $_POST['qty'] ?? 0;
            $price = $_POST['price'] ?? 0;
            $img_url = "";
            $description = $_POST['description'] ?? "";
            $allowed_mime_types = [
                "jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "png" => "image/png",
                "gif" => "image/gif"
            ];
            // Get mime type of the uploaded file
            $file_mime_type = mime_content_type($_FILES['img_file']['tmp_name']);
            // Generate a random name for the uploaded file
            $random_name = Utils\base64url_encode(openssl_random_pseudo_bytes(12));
            // Only allow files less than or equal to 10MB
            $allowed_file_size = 10000000;
            if (
                in_array($file_mime_type, $allowed_mime_types) &&
                $_FILES['img_file']['size'] <= $allowed_file_size
            ) {
                // Check if there is an error during the upload
                if ($_FILES['img_file']['error'] > 0) {
                    echo "Return Code: " . $_FILES['img_file']['error'] . "<br>";
                } else {
                    move_uploaded_file(
                        $_FILES['img_file']['tmp_name'],
                        'upload/' . $random_name . '.' . pathinfo($_FILES['img_file']['name'], PATHINFO_EXTENSION)
                    );
                    $img_url = "/products/" . $random_name . '.' . pathinfo($_FILES['img_file']['name'],
                            PATHINFO_EXTENSION);
                }
            } else {
                echo <<<HTML
                <script>
                    alert('Invalid file');
                </script>
                HTML;
            }


            if ($qty <= 0 || $price <= 0) {
                Utils\redirect_with_message(
                    Utils\BASE_URL . "/Product/index",
                    "Cập nhật sản phẩm thất bại"
                );
            }
            $record = [
                "category_id" => $category_id,
                "name" => $name,
                "qty" => $qty,
                "price" => $price,
                "img_url" => $img_url,
                "description" => $description
            ];
            if (isset($data) && !isset($data["id"])) {
                if ($data["product_model"]->add_product($record)) {
                    Utils\redirect_with_message(
                        Utils\BASE_URL . "/Product/index",
                        "Thêm sản phẩm thành công"
                    );
                } else {
                    Utils\redirect_with_message(
                        Utils\BASE_URL . "/Product/index",
                        "Thêm sản phẩm thất bại"
                    );
                }
            } else {
                if ($data["product_model"]->update_product($id, $record)) {
                    Utils\redirect_with_message(
                        Utils\BASE_URL . "/Product/index",
                        "Cập nhật sản phẩm thành công"
                    );
                } else {
                    Utils\redirect_with_message(
                        Utils\BASE_URL . "/Product/index",
                        "Cập nhật sản phẩm thất bại"
                    );
                }
            }
        }
        ?>
        <?php
        if (isset($data["product"])) {
            while ($row = mysqli_fetch_assoc($data["product"])) {
                ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="idInput" class="form-label ">ID</label>
                        <input
                                type="number"
                                id="idInput"
                                name="id"
                                class="form-control"
                                value="<?php if (isset($data["id"])) echo $data["id"] ?>"
                                required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input type="text"
                               id="nameInput"
                               name="name"
                               class="form-control"
                               value="<?php echo $row["name"] ?>"
                               required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="qtyInput" class="form-label">Quantity</label>
                        <input type="text" id="qtyInput" name="qty" class="form-control"
                               value="<?php echo $row["qty"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="priceInput" class="form-label">Price</label>
                        <input type="text" id="priceInput" name="price" class="form-control"
                               value="<?php echo $row["price"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryInput" class="form-label">Category ID</label>
                        <input type="text" id="categoryInput" name="category_id" class="form-control"
                               value="<?php echo $row["category_id"] ?>"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="descInput" class="form-label">Description</label>
                        <input type="text" id="descInput" name="description" class="form-control"
                               value="<?php echo $row["description"] ?>"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Filename:</label>
                        <input class="form-control" id="fileUpload" type="file" name="img_file">
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Save changes" class="btn btn-primary" name="submit">
                    </div>
                </form>
                <?php
            }
        } else {
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="idInput" class="form-label">ID</label>
                    <input type="number" id="idInput" name="id" class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" id="nameInput" name="name" class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label for="qtyInput" class="form-label">Quantity</label>
                    <input type="text" id="qtyInput" name="qty" class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label for="priceInput" class="form-label">Price</label>
                    <input type="text" id="priceInput" name="price" class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label for="categoryInput" class="form-label">Category ID</label>
                    <input type="text" id="categoryInput" name="category_id" class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label for="descInput" class="form-label">Description</label>
                    <input type="text" id="descInput" name="description" class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label for="fileUpload" class="form-label">Filename:</label>
                    <input class="form-control" id="fileUpload" type="file" name="img_file">
                </div>

                <div class="d-flex justify-content-end">
                    <input type="submit" value="Save changes" class="btn btn-primary" name="submit">
                </div>
            </form>
            <?php
        }
        ?>
    </div>
</div>