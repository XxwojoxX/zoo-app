<?php
session_start();

require_once "../PHP/connect.php";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sprawdź, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz ID produktu do usunięcia
    $productId = $_POST["deleteproductId"];

    // Rozpocznij transakcję, aby zapewnić integralność danych
    $conn->begin_transaction();

    try {
        // Usuń powiązane rekordy z tabeli order_products
        $deleteOrderProductsSql = "DELETE FROM order_products WHERE productId = ?";
        $stmtOrderProducts = $conn->prepare($deleteOrderProductsSql);
        $stmtOrderProducts->bind_param("i", $productId);
        $stmtOrderProducts->execute();
        $stmtOrderProducts->close();

        // Usuń powiązane rekordy z tabeli orders
        $deleteOrdersSql = "DELETE FROM orders WHERE orderId NOT IN (SELECT orderId FROM order_products)";
        $stmtOrders = $conn->prepare($deleteOrdersSql);
        $stmtOrders->execute();
        $stmtOrders->close();

        // Usuń produkt z tabeli products
        $deleteProductSql = "DELETE FROM products WHERE productId = ?";
        $stmtDeleteProduct = $conn->prepare($deleteProductSql);
        $stmtDeleteProduct->bind_param("i", $productId);
        $stmtDeleteProduct->execute();
        $stmtDeleteProduct->close();

        // Zatwierdź transakcję
        $conn->commit();

        // Ustaw zmienną sesji, aby poinformować o pomyślnym działaniu
        $_SESSION['success_message'] = true;

        // Przekieruj po zakończeniu przetwarzania
        header("Location: ../admin/admin_panel.php");
        exit;
    } catch (Exception $e) {
        // W przypadku błędu transakcji, wycofaj zmiany
        $conn->rollback();

        echo "Błąd: " . $e->getMessage();
    }
}

// Zamknij połączenie z bazą danych
$conn->close();
?>