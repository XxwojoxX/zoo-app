<?php
// Plik: delete_order.php
session_start();

require_once "../PHP/connect.php";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sprawdź, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $deleteOrderId = $_POST["deleteOrderId"];

    // Przygotuj zapytanie SQL do usunięcia powiązań z order_products
    $sqlDeleteOrderProducts = "DELETE FROM order_products WHERE order_id = ?";
    $stmtDeleteOrderProducts = $conn->prepare($sqlDeleteOrderProducts);
    $stmtDeleteOrderProducts->bind_param("i", $deleteOrderId);

    // Wykonaj zapytanie usuwające powiązania z order_products
    if ($stmtDeleteOrderProducts->execute()) {
        // Przygotuj zapytanie SQL do usunięcia zamówienia
        $sqlDeleteOrder = "DELETE FROM orders WHERE orderId = ?";
        $stmtDeleteOrder = $conn->prepare($sqlDeleteOrder);
        $stmtDeleteOrder->bind_param("i", $deleteOrderId);

        // Wykonaj zapytanie usuwające zamówienie
        if ($stmtDeleteOrder->execute()) {
            // Ustaw zmienną sesji, aby poinformować o pomyślnym działaniu
            $_SESSION['success_message'] = true;

            // Przekieruj po zakończeniu przetwarzania
            header("Location: ../admin/admin_panel.php");
            exit;
        } else {
            echo "Błąd: " . $stmtDeleteOrder->error;
        }
    } else {
        echo "Błąd: " . $stmtDeleteOrderProducts->error;
    }

    // Zamknij przygotowane zapytania
    $stmtDeleteOrderProducts->close();
    $stmtDeleteOrder->close();
}

// Zamknij połączenie z bazą danych
$conn->close();
?>