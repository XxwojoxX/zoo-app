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
    <script src="scripts/price_range.js"></script>
    <script src="scripts/redirect.js"></script>
    <script src="scripts/Fetch_api.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>
</head>

<body>
    <div class="home">
        <header></header>

        <div class="filter-section">
    <form id="filterForm" method="get" action="PHP/get_products.php">
        <label for="category">Kategoria:</label>
        <select id="category" name="category">
            <option value="all" selected>Wszystkie kategorie</option>
            <option value="t-shirt">Koszulki</option>
            <option value="hoodie">Bluzy</option>
            <option value="mascot">Maskotki</option>
            <option value="ticket">Bilety</option>
        </select>

        <label for="price-range">Zakres cenowy:</label>
        <div class="price-slider-container">
            <span class="min-price" id="min-price">10</span>
            <input type="range" id="price-range" min="0" max="500" step="1" oninput="updatePrice()" name="price-range">
            <span class="max-price" id="max-price">500</span>
            <div class="selected-price-container">
                <span id="selected-price">Wybrana cena: </span>
            </div>
        </div>

        <label for="sort" id="sort-label">Sortuj:</label>
        <select id="sort" name="sort">
            <option value="default" selected>Domyślnie</option>
            <option value="price-asc">Cena rosnąco</option>
            <option value="price-desc">Cena malejąco</option>
            <option value="alphabetical-asc">Alfabetycznie A-Z</option>
            <option value="alphabetical-desc">Alfabetycznie Z-A</option>
        </select>

        <button class="filter-btn" type="submit">Zastosuj Filtry</button>
    </form>
</div>

        <div class="shop-container">
            <div class="flip-card-section">

                <?php
                include "PHP/get_products.php";

                foreach ($products as $product) {
                    echo '<div class="flip-card">';
                    echo '<div class="flip-card-inner">';
                    echo '<div class="flip-card-front">';
                    echo '<img src="' . $product['image'] . '" style="width: 75%; height: 75%; border-radius: 20px; margin-top: 30px;">';
                    echo '<p id="product-name">' . $product['name'] . '</p>';
                    echo '<p>' . $product['price'] . ' zł</p>';
                    echo '</div>';
                    echo '<div class="flip-card-back">';
                    echo '<img src="' . $product['image'] . '" style="width: 75%; height: 75%; border-radius: 20px; margin-top: 30px;">';
                    echo '<div><button class="product-btn" onclick="redirectToProductPage(\'' . htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') . '\')">Zobacz</button>';
                    echo '<p>' . $product['price'] . ' zł</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <footer></footer>
    </div>
</body>

</html>