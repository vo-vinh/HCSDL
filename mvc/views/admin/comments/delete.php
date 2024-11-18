<?php
Utils\ensure_logged_in_as_admin();
if (isset($data["pid"])) {
    $pid = $data["pid"];
    $cid = $data["cid"];
    $redirect_url = Utils\BASE_URL . "/Comment/index";
    if ($data["comment_model"]->delete_comment($pid, $cid)) {
        Utils\redirect_with_message($redirect_url, "Xoá comment thành công");
    } else {
        Utils\redirect_with_message($redirect_url, "Xoá comment thất bại");
    }
}
