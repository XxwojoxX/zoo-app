<!-- Plik: delete_event.php -->
<?php
session_start();

require_once "../PHP/connect.php";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sprawdź, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete-event"])) {
    // Pobierz dane z formularza
    $deleteEventId = $_POST["deleteEventId"];

    // Przygotuj zapytanie SQL do usuwania wydarzenia
    $sqlDeleteEvent = "DELETE FROM events WHERE eventId = ?";
    $stmtDeleteEvent = $conn->prepare($sqlDeleteEvent);
    $stmtDeleteEvent->bind_param("i", $deleteEventId);

    // Wykonaj zapytanie usuwające wydarzenie
    if ($stmtDeleteEvent->execute()) {
        // Ustaw zmienną sesji, aby poinformować o pomyślnym działaniu
        $_SESSION['success_message'] = true;

        // Przekieruj po zakończeniu przetwarzania
        header("Location: ../admin/admin_panel.php");
        exit;
    } else {
        echo "Błąd: " . $stmtDeleteEvent->error;
    }

    // Zamknij przygotowane zapytanie
    $stmtDeleteEvent->close();
}

// Zamknij połączenie z bazą danych
$conn->close();
?>