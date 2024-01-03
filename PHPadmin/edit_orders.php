<?php
// Plik: edit_orders.php
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
    $orderId = $_POST["orderId"];
    $orderDeliveryStreet = $_POST["orderDeliveryStreet"];
    $orderDeliveryOption = $_POST["orderDeliveryOption"];
    $orderPaymentMethod = $_POST["orderPaymentMethod"];
    $orderDeliveryLocal = $_POST["orderDeliveryLocal"];
    $orderStatus = $_POST["orderStatus"];

    // Przygotuj zapytanie SQL do aktualizacji danych w bazie
    $sql = "UPDATE orders SET 
            orderDeliveryStreet = ?,
            orderDeliveryOption = ?,
            orderPaymentMethod = ?,
            orderDeliveryLocal = ?,
            orderStatus = ?
            WHERE orderId = ?";

    // Przygotuj zapytanie SQL do wykonania
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $orderDeliveryStreet, $orderDeliveryOption, $orderPaymentMethod, $orderDeliveryLocal, $orderStatus, $orderId);

    // Wykonaj zapytanie i sprawdź, czy się udało
    if ($stmt->execute()) {
        // Ustaw zmienną sesji, aby poinformować o pomyślnym działaniu
        $_SESSION['success_message'] = true;

        // Przekieruj po zakończeniu przetwarzania
        header("Location: ../admin/admin_panel.php");
        exit;
    } else {
        echo "Błąd: " . $stmt->error;
    }

    // Zamknij przygotowane zapytanie
    $stmt->close();
}

// Zamknij połączenie z bazą danych
$conn->close();
?>