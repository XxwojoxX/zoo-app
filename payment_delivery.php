<?php
session_start();
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media_form.css">
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

        <?php
// Oblicz sumę cen produktów w koszyku
$totalPrice = 0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $product) {
        $totalPrice += $product['price'];
    }
}
?>
        <div class="order-container" id="order-container">
        <a href="cart.php"><button class="back-to-cart-btn">Powrot do koszyka</button></a>
            <h2>Twoje zamówienie:</h2>

            <?php
            // Sprawdź, czy koszyk istnieje w sesji
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $product) {
                    echo '<div class="payment-product-info">';
                    echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" width="100" height="100">';
                    echo '<strong>Nazwa:</strong> ' . $product['name'];
                    echo '<strong>Cena:</strong> ' . $product['price'] . ' zł';
                    echo '<input type="hidden" name="product_name" value="' . $product['name'] . '">';
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
        </div>

        <form class="form" id="demo-form" method="POST" action="PHP/process_order.php">
            <p class="title">Dane do zamówienia</p>

            <!-- Adres dostawy -->
            <label>
                <input required="" placeholder="" class="input" name="delivery_street"></textarea>
                <span>Ulica*</span>
            </label>

            <label>
                <input required="" placeholder="" class="input" name="delivery_local">
                <span>Numer lokalu*</span>
            </label>

            <p class="title">Szczegóły zamówienia</p>

            <!-- Opcje dostawy -->
            <label>
                <select required="" class="input" name="delivery_option">
                    <option value="default" selected>Wybierz sposób dostawy</option>
                    <option value="standard">Paczkomat Inpost</option>
                    <option value="express">Kurier DHL</option>
                    <option value="express">Kurier DPD</option>
                    <option value="slow">Poczta Polska</option>
                    <!-- Dodaj inne opcje dostawy -->
                </select>
            </label>

            <!-- Metoda płatności -->
            <label>
                <select required="" class="input" name="payment_method">
                    <option value="default" selected>Wybierz opcję płatności</option>
                    <option value="paypal">Paypal</option>
                    <option value="bank_transfer">Przelew internetowy</option>
                    <option value="tradition_transfer">Przelew tradycyjny</option>
                    <!-- Dodaj inne metody płatności -->
                </select>
            </label>

            <!-- Checkbox z potwierdzeniem warunków -->
            <label class="checkbox-label">
                <input type="checkbox" required="" name="terms_agreement">
                <span>Akceptuję warunki zamówienia i regulamin sklepu*</span>
            </label>

            <!-- Przycisk potwierdzający zamówienie -->
            <button type="submit" class="submit">Złóż zamówienie</button>
        </form>


        <footer></footer>
    </div>
</body>

</html>