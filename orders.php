<?php
session_start();

if (!isset($_SESSION['userName'])) {
    header("Location: login_form.php");
}
?>

<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/media.css">

        <script src="scripts/cookie.js"></script>
        <script src="scripts/cookie2.js"></script>
    <script src="scripts/Fetch_api.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <title>ZOO</title>
    </head>

    <body>
    <div class="home">
    <header></header>

        <div class="order-container">
            <?php
                require "PHP/get_orders.php";

                if (empty($orders)) {
                    echo "No orders found";
                } else {
                    foreach ($orders as $order) {
                        echo "<div class='order'>";
                        echo "<div class='order-id'>Order ID: " . $order['id'] . "</div>";
                        echo "<div class='order-userName'>User name: " . $order['userName'] . "</div>";
                        echo "<div class='order-deliveryStreet'>Delivery street: " . $order['orderDeliveryStreet'] . "</div>";
                        echo "<div class='order-deliveryOption'>Delivery option: " . $order['orderDeliveryOption'] . "</div>";
                        echo "<div class='order-paymentMethod'>Payment method: " . $order['orderPaymentMethod'] . "</div>";
                        echo "<div class='order-dataZamowienia'>Order date: " . $order['dataZamowienia'] . "</div>";
                        echo "<div class='order-deliveryLocal'>Delivery local: " . $order['orderDeliveryLocal'] . "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </div>

        <footer></footer>
    </div>
    </body>
</html>