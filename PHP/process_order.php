<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Pobierz dane z formularza
$delivery_street = $_POST['delivery_street'];
$delivery_local = $_POST['delivery_local'];
$delivery_option = $_POST['delivery_option'];
$payment_method = $_POST['payment_method'];
$terms_agreement = isset($_POST['terms_agreement']) ? 1 : 0;

// Sprawdź, czy regulamin został zaakceptowany
if (!$terms_agreement) {
    die("Musisz zaakceptować warunki zamówienia i regulamin sklepu.");
}

// Przykładowa konfiguracja bazy danych
require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Sprawdź połączenie
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Pobierz ID aktualnie zalogowanego użytkownika (załóżmy, że jest to zmienna sesji 'userId')
$user_id = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;

// Przygotuj zapytanie SQL i wykonaj wstawienie danych zamówienia do bazy
$sql = "INSERT INTO orders (userId, orderDeliveryStreet, orderDeliveryLocal, orderDeliveryOption, orderPaymentMethod)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("isssi", $user_id, $delivery_street, $delivery_local, $delivery_option, $payment_method);
$stmt->execute();

// Pobierz ID ostatnio wstawionego zamówienia
$order_id = $stmt->insert_id;

// Wstawienie produktów z koszyka do tabeli z produktami w zamówieniu
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart_item) {
        // Sprawdź, czy klucz 'id' istnieje w bieżącym elemencie koszyka
        if (isset($cart_item['id'])) {
            $product_id = $cart_item['id'];

            // Wstaw produkt do tabeli z produktami w zamówieniu
            $sql_products = "INSERT INTO order_products (order_id, product_id) VALUES (?, ?)";
            $stmt_products = $connect->prepare($sql_products);
            $stmt_products->bind_param("ii", $order_id, $product_id);
            $stmt_products->execute();
            $stmt_products->close();
            header("Location: ../index.php");
        } else {
            // Tutaj możesz obsłużyć sytuację, gdy klucz 'id' nie istnieje
            // np. przez zalogowanie komunikatu lub podjęcie innej akcji
            echo "Błąd: Brak klucza 'id' w jednym z elementów koszyka.";
        }
    }

    unset($_SESSION['cart']);
}

// Zamknij połączenie z bazą danych
$stmt->close();
$connect->close();
?>