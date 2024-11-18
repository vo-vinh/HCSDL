<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OG!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/css/uikit.min.css"
          integrity="sha256-g6gAt7SnkDNr6z27eXVf5rh8VkoY0FlMZO5/xfjuIaE=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"
            integrity="sha256-j5d+WnCH6rJf0zHnz8sNl0NX98gMYhaXBHHO7BWFHiE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"
            integrity="sha256-1BS6fnknrfHf2RSvnVl11uenVY2m3pLRpomLjEOm9RA=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo Utils\BASE_URL ?>/public/assets/css/main.css">
    <link id="dm-light" rel="stylesheet" href="<?php echo Utils\BASE_URL ?>/public/assets/css/light.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="page-home dm-light">
<?php
if (isset($data)) {
    require_once "./mvc/views/" . $data["page"] . ".php";
}
?>

<script src="<?php echo Utils\BASE_URL ?>/public/assets/js/main.js"></script>
<script src="<?php echo Utils\BASE_URL ?>/public/assets/js/fontawesome.all.min.js"></script>
</body>

</html>