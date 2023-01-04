<?php
session_start();
require '../src/connect.php';
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
    <?php
    if (!array_key_exists('token', $_SESSION)) {
    ?>
    <h1>You are not logged in!<br>Please log in at <a href="/login"><span>LogIn</span></a></h1>
    <?php
        return;
    }

    $conn = db_connect();
    $token = $_SESSION['token'];
    $sql = "SELECT id FROM users WHERE token = '$token';";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row)
        return;

    $id = $row['id'];
    $sql = "SELECT product FROM cart WHERE user_id = $id";
    $conn->query($sql);
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
    ?>
    <h1>There is nothing in your cart, go add something!</h1>
    <a href="/home" style="text-align: center;">
        <h1 style="scale:2;">
            <span>Pitshop</span>
        </h1>
    </a>
    <?php
        return;
    }

    $product_array = explode(',', $row['product']);

    $total = 0;

    foreach ($product_array as $item) {
        $sql = "SELECT * FROM products WHERE name = '$item';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $total += $price;
        echo "<h1 style='text-align: center;'><span>$name | $description | \$$price</span></h1>";
    }

    echo "<h1 style='text-align: center;'><span>Total: $total</span></h1>";
    $conn->close();
    ?>

    <form method="get" action="/src/order.php">
        <input type="hidden" name="price" value="<?php echo $total ?>">

        <label for="country">Country</label>
        <input type="text" name="country" required>

        <label for="county">County</label>
        <input type="text" name="county" required>

        <label for="city">City</label>
        <input type="text" name="city" required>

        <label for="street">Street</label>
        <input type="text" name="street" required>

        <label for="number">Number</label>
        <input type="text" name="number" required>

        <button type="submit">Order</button>
    </form>
</body>

</html>