<?php

class App
{
    protected mixed $page = "Home";
    protected mixed $action = "index";
    protected array $params = [];

    function __construct()
    {
        $url_arr = $this->get_url();

        if (isset($url_arr[0])) {
            if (file_exists("./mvc/controllers/" . $url_arr[0] . ".php")) {
                $this->page = $url_arr[0];
            }
            unset($url_arr[0]);
        }

        require_once "./mvc/controllers/" . $this->page . ".php";
        $this->page = new $this->page;

        if (isset($url_arr[1])) {
            if (strlen(strstr($url_arr[1], ".php")) > 0) {
                $url_arr[1] = substr($url_arr[1], 0, strlen($url_arr[1]) - 4);
            }
            if (method_exists($this->page, $url_arr[1])) {
                $this->action = $url_arr[1];
            }
            unset($url_arr[1]);
        }

        $this->params = $url_arr ? array_values($url_arr) : [];
        call_user_func_array([$this->page, $this->action], $this->params);
    }

    function get_url(): array
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"])));
        }
        return [];
    }
}
