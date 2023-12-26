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
    <script src="scripts/autohide.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO - Twój koszyk</title>
</head>

<body>
    <div class="home">
        <header></header>

        <?php
// Oblicz sumę cen produktów w koszyku
$totalPrice = 0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $product) {
        $totalPrice += $product['price'];
    }
}
?>

        <div class="cart-section">
            <?php
                // Sprawdź, czy produkt został dodany do koszyka i wyświetl komunikat
                if (isset($_SESSION['deleteFromCartSuccess']) && $_SESSION['deleteFromCartSuccess']) {
                    echo '<div class="delete-success-message" id="delete-success-message">';
                    echo '<h2>Produkt został usunięty z koszyka!</h2>';
                    echo '</div>';
                    
                    // Resetuj zmienną sesji po wyświetleniu komunikatu
                    $_SESSION['addToCartSuccess'] = false;
                }
            ?>
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
            <div class="cart-total">
                <h1 class="total-price">Suma: </h1>
                <h2 class="total-amount"><?php echo number_format($totalPrice, 2); ?> zł</h2>
            </div>
            <div class="payment-delivery-link">
            <a href="payment_delivery.php"><button class="payment-delivery-btn">Przejdź do płatności</button></a>
            </div>
        </div>

        <footer></footer>
    </div>
</body>

</html>