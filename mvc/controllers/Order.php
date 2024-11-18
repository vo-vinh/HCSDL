<?php

class Order extends Controller
{
    function index(): void
    {
        $order = $this->model_query("OrderModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/orders/index",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "orders" => $order->fetch_all_orders()
        ]);
    }

    function edit($id): void
    {
        $order = $this->model_query("OrderModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/orders/edit",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "order" => $order->get_order($id),
            "id" => $id,
            "order_model" => $order
        ]);
    }

    function delete($id): void
    {
        $order = $this->model_query("OrderModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/orders/delete",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "order" => $order->get_order($id),
            "id" => $id,
            "order_model" => $order
        ]);
    }
}
