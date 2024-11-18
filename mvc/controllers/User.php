<?php

class User extends Controller
{
    function sign_up(): void
    {
        $userModel = $this->model_query("UserModel");
        $customerModel = $this->model_query("CustomerModel");
        $this->view_render("layouts/log",
            ["log_page" => "application/User/sign_up", "user_model" => $userModel, "customer_model" => $customerModel]);
    }

    function sign_in(): void
    {
        $userModel = $this->model_query("UserModel");
        $customerModel = $this->model_query("CustomerModel");
        $this->view_render("layouts/log",
            ["log_page" => "application/User/sign_in", "user_model" => $userModel, "customer_model" => $customerModel]);
    }

    function log_out(): void
    {
        $userModel = $this->model_query("UserModel");
        $customerModel = $this->model_query("CustomerModel");
        $this->view_render("layouts/log",
            ["log_page" => "application/User/log_out", "user_model" => $userModel, "customer_model" => $customerModel]);
    }
}
