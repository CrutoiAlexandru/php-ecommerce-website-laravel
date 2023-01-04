<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/global/style.css">
    <link rel="stylesheet" href="style.css">
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
        header('Location: /login');
        return;
    } ?>

    <h1 style='text-align: center;'><span>Previous orders</span></h1>
    <div style="width: 100vw; display:flex; justify-content: center;">
        <div class="line" style="width:90vw;"></div>
    </div>

    <?php
    require('../src/connect.php');
    $conn = db_connect();
    $token = $_SESSION['token'];

    $sql = "SELECT id FROM users WHERE token = '$token';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];

    $sql = "SELECT * from orders WHERE user_id = '$id';";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $product = $row['product'];
        $location = $row['country'] . ', ' . $row['county'] . ', ' . $row['city'] . ', ' . $row['street'] . ', ' . $row['number'];
        $price = $row['price'];
        $stage = $row['stage'];
        echo "<h2 style='text-align: center;'>$product | $location | <span>\$$price</span> | $stage</h2>";
        echo '<div style="width: 100vw; display:flex; justify-content: center;">
                <div class="line" style="width:90vw;"></div>
              </div>';
    }
    ?>

    <a href="/src/out.php">
        <h1 style="text-align: center;"><span>LogOut</span></h1>
    </a>
</body>

</html>