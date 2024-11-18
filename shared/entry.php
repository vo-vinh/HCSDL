<?php

namespace Utils;

const BASE_URL = "http://localhost/as232";

const _JWT_SECRET = 'D5Y&unVTCeLRYimfSYoZhVXa6S5FZU3g6$gPZEFrWyz3883Ziu$StNM2utPu5WL4R2L#3xT9E%gQasJ6TFkDA^ibqvV%4yxSDUZ%s&3AHa2b88xhXdvy!K$r9$#wouzH';

function ensure_logged_in(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $url = BASE_URL . "/user/sign_in";
    if (!isset($_SESSION["_token"])) {
        echo <<<HTML
        <script>
            "use strict";
            window.location.href = "$url";
        </script>
        HTML;
    } else {
        if (jwt_verify($_SESSION["_token"]) === false) {
            unset($_SESSION["_token"]);
            echo <<<HTML
            <script>
                "use strict";
                window.location.href = "$url";
            </script>
            HTML;
        }
    }
}

function ensure_logged_in_as_admin(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $url = BASE_URL . "/user/sign_in";
    if (!isset($_SESSION["_token"])) {
        echo <<<HTML
        <script>
            "use strict";
            window.location.href = "$url";
        </script>
        HTML;
    } else {
        if (jwt_verify($_SESSION["_token"]) === false) {
            unset($_SESSION["_token"]);
            echo <<<HTML
            <script>
                "use strict";
                window.location.href = "$url";
            </script>
            HTML;
        } else {
            $claims = jwt_get_claims($_SESSION["_token"]);
            if ($claims["role"] !== "admin") {
                echo <<<HTML
                <script>
                    "use strict";
                    window.location.href = "$url";
                </script>
                HTML;
            }
        }
    }
}

function redirect_with_message(string $url, string $message): void
{
    echo <<<"HTML"
    <script>
        "use strict";
        alert("$message");
        window.location.href = "$url";
    </script>
    HTML;
}

function base64url_encode($data): string
{
    return str_replace('=', '', strtr(base64_encode($data), '+/', '-_'));
}

function base64url_decode($data): false|string
{
    $remainder = strlen($data) % 4;
    if ($remainder) {
        $padlen = 4 - $remainder;
        $data .= str_repeat('=', $padlen);
    }
    return base64_decode(strtr($data, '-_', '+/'));
}

function jwt_generate($record): string
{
    $header = array(
        "alg" => "HS256",
        "typ" => "JWT",
    );
    $data = array(
        "id" => $record["id"],
        "name" => $record["name"],
        "email" => $record["email"],
        "phone" => $record["phone"],
        "role" => $record["role"],
        "iat" => time(),
        "exp" => null,
    );
    $pre_token = base64url_encode(json_encode($header)) . "." . base64url_encode(json_encode($data));
    $signature = hash_hmac("sha256", $pre_token, _JWT_SECRET, true);
    return $pre_token . "." . base64url_encode($signature);
}

function jwt_verify($token): bool
{
    if (empty($token)) {
        return false;
    }
    if (substr_count($token, '.') !== 2) {
        return false;
    }
    $parts = explode('.', $token);
    $signature = base64url_decode($parts[2]);
    if ($signature === false) {
        return false;
    }
    $hash = hash_hmac("sha256", $parts[0] . '.' . $parts[1], _JWT_SECRET, true);
    return hash_equals($signature, $hash);
}

function jwt_get_claims($token): array|false
{
    if (empty($token)) {
        return false;
    }
    if (!jwt_verify($token)) {
        return false;
    }
    $parts = explode('.', $token);
    return json_decode(base64url_decode($parts[1]), true);
}
