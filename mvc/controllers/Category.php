<?php

class Category extends Controller
{
    function index(): void
    {
        $category = $this->model_query("CategoryModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/categories/index",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "categories" => $category->fetch_all_categories()
            ]
        );
    }

    function new(): void
    {
        $category = $this->model_query("CategoryModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/categories/new",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "category_model" => $category
            ]
        );
    }

    function edit($id): void
    {
        $category = $this->model_query("CategoryModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/categories/edit",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "category" => $category->get_category($id),
                "id" => $id,
                "category_model" => $category
            ]
        );
    }

    function delete($id): void
    {
        $category = $this->model_query("CategoryModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/categories/delete",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "category" => $category->get_category($id),
                "id" => $id,
                "category_model" => $category
            ]
        );
    }
}
