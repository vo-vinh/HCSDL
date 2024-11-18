<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($data["id"])) {
        $id = $data["id"];
        $name = $_POST['name'];
        $redirect_url = Utils\BASE_URL . "/Customer/index";
        if ($data["customer_model"]->update_customer($id, $name)) {
            Utils\redirect_with_message($redirect_url, "Sửa customer thành công");
        } else {
            Utils\redirect_with_message($redirect_url, "Sửa customer thất bại");
        }
    }
}
?>

<h1>Editing Customer</h1>
<div class="card">
    <div class="card-body">
        <form method="POST" action="">
            <div class="row form-group">
                <label for="nameInput" class="col-sm-2 col-form-label input-label">Tên khách hàng</label>
                <div class="col-sm-10">
                    <input
                            type="text"
                            id="nameInput"
                            name="name"
                            class="form-control"
                            placeholder="Thay đổi tên khách hàng"
                            required
                    />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" value="Save changes" class="btn btn-primary">
            </div>
        </form>

    </div>
</div>
<a href="<?php echo Utils\BASE_URL ?>/Customer/index">Back</a>
