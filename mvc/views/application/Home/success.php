<?php
if (!isset($data)) {
    header("Location: " . Utils\BASE_URL . "/");
}
$customer_id = $data["customer_id"];
$total = $data["total"];
$address = $data["address"];
$note = $data["note"];
/**
 * @var $orderModel OrderModel
 */
$orderModel = $data["order_model"];
$conn = $orderModel->con;
if ($orderModel->add_order($customer_id, $total, $address, $note)) {
    $oid = $conn->insert_id;
    Utils\redirect_with_message(
        Utils\BASE_URL . "/",
        "Đặt hàng thành công. Mã đơn hàng của quý khách là #" . $oid . ". Cảm ơn quý khách rất nhiều.",
    );
} else {
    Utils\redirect_with_message(
        Utils\BASE_URL . "/",
        "Đặt hàng thất bại. Vui lòng thử lại sau.",
    );
}
