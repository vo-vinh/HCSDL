<?php

class Customer extends Controller
{
    function index(): void
    {
        $customer = $this->model_query("CustomerModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/customers/index",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "customers" => $customer->fetch_all_customers()
            ]
        );
    }

    function new(): void
    {
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/customers/new",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar"
            ]
        );
    }

    function edit($id): void
    {
        $customer = $this->model_query("CustomerModel");
        $user = $this->model_query("UserModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/customers/edit",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "customer" => $customer->get_customer($id),
                "id" => $id,
                "customer_model" => $customer,
                "user_model" => $user
            ]
        );
    }

    function delete($id): void
    {
        $customer = $this->model_query("CustomerModel");
        $user = $this->model_query("UserModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/customers/delete",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "customer" => $customer->get_customer($id),
                "id" => $id,
                "customer_model" => $customer,
                "user_model" => $user
            ]
        );
    }
}
