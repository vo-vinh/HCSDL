<?php

class Product extends Controller
{
    function index(): void
    {
        $product = $this->model_query("ProductModel");
        $category = $this->model_query("CategoryModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/products/index",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "products" => $product->fetch_all_products(),
            "categories" => $category->fetch_all_categories()
        ],);
    }

    function new(): void
    {
        $product = $this->model_query("ProductModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/products/new",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "product_model" => $product
        ]);
    }

    function edit($id): void
    {
        $product = $this->model_query("ProductModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/products/edit",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "product" => $product->get_product($id),
            "id" => $id,
            "product_model" => $product
        ]);
    }

    function delete($id): void
    {
        $product = $this->model_query("ProductModel");
        $this->view_render("layouts/admin", [
            "admin_page" => "admin/products/delete",
            "admin_header" => "shared/admin_header",
            "admin_sidebar" => "shared/admin_sidebar",
            "product" => $product->get_product($id),
            "id" => $id,
            "product_model" => $product
        ]);
    }
}
