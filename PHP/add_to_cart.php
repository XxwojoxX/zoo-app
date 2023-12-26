<?php
session_start();

// Sprawdź, czy przekazano nazwę produktu do dodania do koszyka
if (isset($_POST['product_name'])) {
    $productName = $_POST['product_name'];

    // Przypisz informacje o produkcie do koszyka (tutaj zakładam, że masz już te informacje w zmiennej sesji)
    if (isset($_SESSION['chosenProduct'])) {
        $productInfo = $_SESSION['chosenProduct'];

        // Dodaj produkt do koszyka
        addToCart($productInfo);

        // Przekieruj z powrotem na stronę produktu
        header("Location: ../chosen_product.php");
        exit();
    } else {
        // Ustaw zmienną sesji na błąd, jeśli brak informacji o produkcie
        $_SESSION['chosenProductError'] = 'Product information not available';
    }
}

// Funkcja do dodawania produktu do koszyka
function addToCart($productInfo) {
    // Sprawdź, czy koszyk już istnieje w sesji
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Dodaj produkt do koszyka
    $_SESSION['cart'][] = $productInfo;

    // Ustaw zmienną sesji na informację o dodaniu do koszyka
    $_SESSION['addToCartSuccess'] = true;
}
?>
