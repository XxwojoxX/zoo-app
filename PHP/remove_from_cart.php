<?php
session_start();

// Sprawdź, czy przekazano nazwę produktu do usunięcia z koszyka
if (isset($_POST['product_name'])) {
    $productName = $_POST['product_name'];

    // Usuń produkt z koszyka
    removeFromCart($productName);

    // Przekieruj z powrotem na stronę koszyka
    header("Location: ../cart.php");
    exit();
}

// Funkcja do usuwania produktu z koszyka
function removeFromCart($productName) {
    // Sprawdź, czy koszyk już istnieje w sesji
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        // Iteruj przez produkty w koszyku
        foreach ($_SESSION['cart'] as $key => $product) {
            // Znajdź produkt o określonej nazwie i usuń go z koszyka
            if ($product['name'] === $productName) {
                unset($_SESSION['cart'][$key]);
                // Przerwij pętlę, ponieważ znaleźliśmy i usunęliśmy produkt
                break;
            }
        }
    }
    // Ustaw zmienną sesji na informację o dodaniu do koszyka
    $_SESSION['deleteFromCartSuccess'] = true;
}
?>