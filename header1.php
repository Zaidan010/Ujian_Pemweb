<?php
require_once 'functions.php';
require_once 'config.php';

$url_path = !empty(SITE_ROOT) ? "/" . SITE_ROOT . "/" : "/";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        header {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        .w3-bar {
            background-color: #333;
        }
        .w3-bar a {
            color: #fff !important;
        }
        .w3-bar a:hover {
            background-color: #575757 !important;
        }
        .w3-container form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header class="w3-container w3-blue-grey">
    <h1>PHP CRUD</h1>
</header>

<div class="w3-bar w3-border">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="<?= $url_path ?>simple/new.php" class="w3-bar-item w3-button">New Post</a>
        <a href="<?= $url_path ?>simple/admin.php" class="w3-bar-item w3-button">Admin Panel</a>
        <a href="<?= $url_path ?>simple/logout.php" class="w3-bar-item w3-button">Logout</a>
    <?php else: ?>
        <a href="<?= $url_path ?>simple/login.php" class="w3-bar-item w3-button">Login</a>
        <a href="<?= $url_path ?>simple/register.php" class="w3-bar-item w3-button">Register</a>
    <?php endif; ?>
</div>


</body>
</html>