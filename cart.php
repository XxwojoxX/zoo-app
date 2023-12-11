<?php
session_start();
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

    <title>ZOO - Twój koszyk</title>
</head>

<body>
    <div class="home">
        <header></header>

        <div class="cart-section">
            <a href="shop.php"><button class="back-to-shop-btn">Powrot do sklepu</button></a>
            <h2>Twój koszyk:</h2>

            <?php
            // Sprawdź, czy koszyk istnieje w sesji
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $product) {
                    echo '<div class="product-info">';
                    echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" width="100" height="100">';
                    echo '<strong>Nazwa:</strong> ' . $product['name'];
                    echo '<strong>Cena:</strong> ' . $product['price'] . ' zł';
                    echo '<form method="post" action="PHP/remove_from_cart.php">';
                    echo '<input type="hidden" name="product_name" value="' . $product['name'] . '">';
                    echo '<button type="submit" id="remove-from-cart-btn">Usuń z koszyka</button>';
                    echo '</form>';
                    echo '</div>';
                    // Dodaj inne informacje o produkcie, jeśli są dostępne
                }
            } else {
                echo '<p>Twój koszyk jest pusty.</p>';
            }
            ?>
        </div>

        <footer></footer>
    </div>
</body>

</html>