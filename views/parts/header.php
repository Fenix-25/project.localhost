<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>

<?php
require_once PARTS_DIR . '/notifications.php'
?>

<header id="navigation">
    <div class="container">
        <div id="mobile-menu" class="row d-flex align-items-center justify-content-between">
            <div id="logo" class="col-sm-12 col-md">
                <a href="/">
                    <img src="<?= IMAGES_URI ?>/logo.png" alt="logo">
                </a>
            </div>
            <div class="col-sm-12 col-md d-flex justify-content-end">
                <nav class="nav d-flex" id="links">
                    <?php if (!empty($mainFields['navigation']['links'])): ?>
                        <?php foreach ($mainFields['navigation']['links'] as $link):
                            $href = DOMAIN . '/' . $link['href'];
                            ?>
                            <a class="nav-link active" href="<?= $href ?>"><?= $link['text'] ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <a href="/cart" class="nav-link cart">
                        <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                        <span class="circle">0
                        </span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>