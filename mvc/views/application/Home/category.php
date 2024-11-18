<?php
$id = null;
if (isset($data)) {
    $id = $data['id'];
}
$_SESSION['category_id'] = $id;
$redirect_url = Utils\BASE_URL . '/home/catalog';
echo <<<HTML
    <script>
        "use strict";
        window.location.href = "$redirect_url";
    </script>
HTML;

