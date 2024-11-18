<?php
if (isset($data["id"])) {
    $id = $data["id"];
    $redirect_url = Utils\BASE_URL . "/Customer/index";
    if ($data["customer_model"]->delete_customer($id)) {
        Utils\redirect_with_message($redirect_url, "Xóa customer thành công");
    } else {
        Utils\redirect_with_message($redirect_url, "Xóa customer thất bại");
    }
}
