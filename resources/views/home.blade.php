<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/global/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
</head>

<body>
    <div>
        <h2>
            <a href="/home">
                <span>
                    Pitshop
                </span>
            </a>
        </h2>
        <div>
            <a href="/aboutus">
                <h2>About us</h2>
            </a>
            <a href="/cart">
                <i class="gg-shopping-cart">
                </i>
            </a>

            <a href="/profile">
                <h2>Profile</h2>
            </a>
        </div>
    </div>

    <div style="width: 100vw; display:flex; justify-content: center;">
        <div class="line"></div>
    </div>

    <?php
    if (!array_key_exists('token', $_SESSION)) {
    ?>
    <div class="grid">
        <h1>In order to see what we have in store for you, please log in</h1>
    </div>
    <?php
        return;
    } ?>

    <div class="grid">
        <div class="grid-categories">
            <a href="/home/beanies" class="grid-categories-link" style="color: white;">
                <h1>Beanies</h1>
            </a>
        </div>
        <div class="grid-categories">
            <a href="/home/hoodies" class="grid-categories-link" style="color: white;">
                <h1>Hoodies</h1>
            </a>
        </div>
        <div class="grid-categories">
            <a href="/home/socks" class="grid-categories-link" style="color: white;">
                <h1>Socks</h1>
            </a>
        </div>
    </div>
</body>

</html>