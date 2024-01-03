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
    // Pobierz dane z formularza
    $username = $_POST["username"];
    $orderDeliveryStreet = $_POST["orderDeliveryStreet"];
    $orderDeliveryOption = $_POST["orderDeliveryOption"];
    $orderPaymentMethod = $_POST["orderPaymentMethod"];
    $orderDeliveryLocal = $_POST["orderDeliveryLocal"];
    $orderStatus = $_POST["orderStatus"];

    // Pobierz userId na podstawie nazwy użytkownika
    $userId = getUserIdByUsername($conn, $username);

    // Przygotuj zapytanie SQL do dodania nowego zamówienia
    $sql = "INSERT INTO orders (userId, orderDeliveryStreet, orderDeliveryOption, 
                                orderPaymentMethod, orderDeliveryLocal, orderStatus)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Przygotuj zapytanie SQL do wykonania
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississ", $userId, $orderDeliveryStreet, $orderDeliveryOption, 
                      $orderPaymentMethod, $orderDeliveryLocal, $orderStatus);

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

function getUserIdByUsername($conn, $username) {
    // Pobierz userId na podstawie nazwy użytkownika
    $sql = "SELECT userId FROM users WHERE userName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['userId'];
    } else {
        // Jeśli użytkownik o danej nazwie nie istnieje, możesz obsłużyć to zgodnie z Twoimi potrzebami.
        // W tym przypadku zwracam wartość null.
        return null;
    }
}
?>