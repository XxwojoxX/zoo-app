<?php
session_start();

if (!isset($_SESSION['userName'])) {
    header("Location: login_form.php");
}
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_form.css">

    <script src="scripts/cookie.js"></script>
    <script src="scripts/cookie2.js"></script>
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
        <form id="filterForm" onsubmit="applyFilters(); return false;">
        <label for="category">Kategoria:</label>
        <select id="category" name="category">
    <option value="all" <?php echo (!isset($_GET['category']) || $_GET['category'] === 'all') ? 'selected' : ''; ?>>Wszystkie kategorie</option>
    <option value="t-shirt" <?php echo (isset($_GET['category']) && $_GET['category'] === 't-shirt') ? 'selected' : ''; ?>>Koszulki</option>
    <option value="hoodie" <?php echo (isset($_GET['category']) && $_GET['category'] === 'hoodie') ? 'selected' : ''; ?>>Bluzy</option>
    <option value="mascot" <?php echo (isset($_GET['category']) && $_GET['category'] === 'mascot') ? 'selected' : ''; ?>>Maskotki</option>
    <option value="ticket" <?php echo (isset($_GET['category']) && $_GET['category'] === 'ticket') ? 'selected' : ''; ?>>Bilety</option>
</select>

<div class="flex">
    <!-- Cena od -->
    <div class="price-input">
        <label for="min-price">Cena od:</label>
        <input type="number" id="min-price" name="min-price" value="<?php echo isset($_GET['min-price']) ? htmlspecialchars($_GET['min-price'], ENT_QUOTES, 'UTF-8') : '10'; ?>" min="0" inputmode="numeric">
    </div>

    <!-- Cena do -->
    <div class="price-input">
        <label for="max-price">Cena do:</label>
        <input type="number" id="max-price" name="max-price" value="<?php echo isset($_GET['max-price']) ? htmlspecialchars($_GET['max-price'], ENT_QUOTES, 'UTF-8') : '300'; ?>" min="0" inputmode="numeric">
    </div>
</div>

        <label for="sort" id="sort-label">Sortuj:</label>
<select id="sort" name="sort">
    <option value="default" <?php echo (!isset($_GET['sort']) || $_GET['sort'] === 'default') ? 'selected' : ''; ?>>Domyślnie</option>
    <option value="price-asc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'price-asc') ? 'selected' : ''; ?>>Cena rosnąco</option>
    <option value="price-desc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'price-desc') ? 'selected' : ''; ?>>Cena malejąco</option>
    <option value="alphabetical-asc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'alphabetical-asc') ? 'selected' : ''; ?>>Alfabetycznie A-Z</option>
    <option value="alphabetical-desc" <?php echo (isset($_GET['sort']) && $_GET['sort'] === 'alphabetical-desc') ? 'selected' : ''; ?>>Alfabetycznie Z-A</option>
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