<?php
Utils\ensure_logged_in_as_admin();

if (isset($data["id"])) {
    $id = $data["id"];
    $redirect_link = Utils\BASE_URL . "/Category/index";
    if ($data["category_model"]->remove_category($id)) {
        Utils\redirect_with_message($redirect_link, "Xoá category thành công");
    } else {
        Utils\redirect_with_message($redirect_link, "Xoá category thất bại");
    }
}
