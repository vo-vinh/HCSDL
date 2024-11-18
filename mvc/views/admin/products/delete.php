<?php
if (isset($data["id"])) {
    $id = $data["id"];
    $redirect_url = Utils\BASE_URL . "/Product/index";
    if ($data["product_model"]->remove_product($id)) {
        Utils\redirect_with_message($redirect_url, "Xóa sản phẩm thành công");
    } else {
        Utils\redirect_with_message($redirect_url, "Xóa sản phẩm thất bại");
    }
}
