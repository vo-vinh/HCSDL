<?php
if (isset($data["id"])) {
    $id = $data["id"];
    $redirect_url = Utils\BASE_URL . "/Order/index";
    if (($data["order_model"]->remove_order($id))) {
        Utils\redirect_with_message($redirect_url, "Xóa thành công");
    } else {
        Utils\redirect_with_message($redirect_url, "Xóa thất bại");
    }
}
