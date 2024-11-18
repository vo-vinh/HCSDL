<?php

class Home extends Controller
{
    function index(): void
    {
        $product = $this->model_query("ProductModel");
        $this->view_render("layouts/application", [
                "page" => "application/home/index",
                "header" => "shared/header",
                "footer" => "shared/footer",
                "products" => $product->fetch_all_products()
            ]
        );
    }

    function catalog(): void
    {
        $product = $this->model_query("ProductModel");
        $this->view_render("layouts/application", [
            "page" => "application/home/catalog",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "products" => $product->fetch_all_products()
        ]);
    }

    function category($id): void
    {
        $this->view_render("layouts/application", ["page" => "application/home/category", "id" => $id]);
    }

    function search($name): void
    {
        $product = $this->model_query("ProductModel");
        $this->view_render("layouts/application", [
            "page" => "application/home/search",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "products" => $product->get_product_by_name($name),
            "name" => $name
        ]);
    }

    function product($id): void
    {
        $product = $this->model_query("ProductModel");
        $comment = $this->model_query("CommentModel");
        $user = $this->model_query("UserModel");
        $this->view_render("layouts/application", [
            "page" => "application/home/product",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "product" => $product->get_product($id),
            "comment_model" => $comment,
            "user_model" => $user,
            "pid" => $id
        ]);
    }

    function contact(): void
    {
        $this->view_render("layouts/application",
            ["page" => "application/home/contact", "header" => "shared/header", "footer" => "shared/footer"]);
    }

    function cart(): void
    {
        $this->view_render("layouts/application",
            ["page" => "application/home/cart", "header" => "shared/header", "footer" => "shared/footer"]);
    }

    function account(): void
    {
        $user = $this->model_query("userModel");
        $this->view_render("layouts/application", [
            "page" => "application/home/account",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "user_model" => $user
        ]);
    }

    function order(): void
    {
        $this->view_render("layouts/application", [
            "page" => "application/home/order",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "order_model" => $this->model_query("OrderModel")
        ]);
    }

    function success($customer_id, $total, $address, $note): void
    {
        $order = $this->model_query("OrderModel");
        $this->view_render("layouts/application", [
            "page" => "application/home/success",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "customer_id" => $customer_id,
            "total" => $total,
            "address" => $address,
            "note" => $note,
            "order_model" => $order
        ]);
    }
}
