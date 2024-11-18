<?php
Utils\ensure_logged_in_as_admin();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>OG! Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo Utils\BASE_URL ?>/public/assets/css/theme_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
            integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
</head>

<body class="footer-offset has-navbar-vertical-aside navbar-vertical-aside-show-xl">
<?php
require_once "./mvc/views/" . $data["admin_header"] . ".php";
?>
<div id="content" role="main" style="display:flex;height:1000vh">
    <?php
    require_once "./mvc/views/" . $data["admin_sidebar"] . ".php";
    ?>
    <div class="content container-fluid" style="padding-top:50px">
        <?php
        require_once "./mvc/views/" . $data["admin_page"] . ".php";
        ?>
    </div>
</div>


</body>
</html>
