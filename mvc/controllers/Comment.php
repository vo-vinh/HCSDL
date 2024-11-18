<?php

class Comment extends Controller
{
    function index(): void
    {
        $comment = $this->model_query("CommentModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/comments/index",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "comments" => $comment->fetch_all_comments()
            ]
        );
    }

    function new(): void
    {
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/comments/new",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar"
            ]
        );
    }

    function edit(): void
    {
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/comments/edit",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar"
            ]
        );
    }

    function delete($pid, $cid): void
    {
        $comment = $this->model_query("CommentModel");
        $this->view_render("layouts/admin",
            [
                "admin_page" => "admin/comments/delete",
                "admin_header" => "shared/admin_header",
                "admin_sidebar" => "shared/admin_sidebar",
                "comment" => $comment->get_comment($pid, $cid),
                "pid" => $pid,
                "cid" => $cid,
                "comment_model" => $comment
            ]
        );
    }
}
