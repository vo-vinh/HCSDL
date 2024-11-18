<?php
session_start();
unset($_SESSION["_token"]);
if (session_destroy()) {
    $redirect_url = Utils\BASE_URL . "/User/sign_in";
    header("Location: $redirect_url");
}
