<?php

class News extends Controller
{
    function index(): void
    {
        $news = $this->model_query("NewsModel");
        $this->view_render("layouts/application", [
            "page" => "application/News/index",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "news" => $news->fetch_all_news()
        ]);
    }

    function detail($id): void
    {
        $news = $this->model_query("NewsModel");
        $this->view_render("layouts/application", [
            "page" => "application/News/page-detail",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "id" => $news->get_news($id),
            "news" => $news->fetch_all_news()
        ]);
    }
}
