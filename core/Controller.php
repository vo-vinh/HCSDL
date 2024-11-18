<?php

class Controller
{
    public function model_query(string $model)
    {
        require_once "./mvc/models/" . $model . ".php";
        return new $model;
    }

    public function view_render($view, $data = []): void
    {
        require_once "./mvc/views/" . $view . ".php";
    }
}
