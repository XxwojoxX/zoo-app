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

    <title>ZOO</title>
</head>

<body>
    <div class="home">
        <header></header>

        <div class="chosen-product-container">
            <a href="shop.php"><button id="go-back-btn">Powrót</button></a>
            <?php
            require_once "PHP/chosen_product_info.php";

            // Sprawdź, czy zmienna sesji z informacjami o produkcie istnieje
            if (isset($_SESSION['chosenProduct'])) {
                $productData = $_SESSION['chosenProduct'];

                // Wyświetl informacje o produkcie
                echo '<img src="' . $productData['image'] . '" alt="' . $productData['name'] . '">';
                echo '<div class="chosen-product-details">';
                echo '<h1>' . $productData['name'] . '</h1>';
                echo '<p id="product-price">Cena: ' . $productData['price'] . ' zł</p>';
                echo '<form method="post" action="PHP/add_to_cart.php">';
                echo '<input type="hidden" name="product_name" value="' . $productData['name'] . '">';
                echo '<button type="submit" id="add-to-cart-btn">Dodaj do koszyka</button>';
                echo '</form>';
                echo '<p id="product-description">' . $productData['description'] . '</p>';
                echo '</div>';
            } else {
                // Wyświetl błąd, jeśli zmienna sesji z błędem istnieje
                echo '<p>Error: ';
                echo isset($_SESSION['chosenProductError']) ? $_SESSION['chosenProductError'] : 'Product data not available';
                echo '</p>';
            }
            ?>
        </div>

        <footer></footer>
    </div>
</body>

</html>