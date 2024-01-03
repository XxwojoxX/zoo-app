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
    $eventId = $_POST["eventId"];
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventDescription = $_POST["eventDescription"];

    // Sprawdź, czy użytkownik wybrał nowy plik
    if (
        isset($_FILES['newEventImage']) &&
        $_FILES['newEventImage']['error'] == UPLOAD_ERR_OK &&
        is_uploaded_file($_FILES['newEventImage']['tmp_name'])
    ) {
        // Ścieżka do folderu, w którym przechowujesz obrazy
        $upload_dir = '../img/';

        // Przenoś plik z folderu tymczasowego do docelowego
        if (move_uploaded_file($_FILES['newEventImage']['tmp_name'], $upload_dir . $_FILES['newEventImage']['name'])) {
            // Ścieżka do zapisania w bazie danych
            $eventImagePath = 'http://localhost/inx2/img/' . $_FILES['newEventImage']['name'];
        } else {
            echo "Błąd przy przesyłaniu pliku.";
            exit;
        }
    } else {
        // Użyj starego obrazu, jeśli nie ma nowego
        $eventImagePath = isset($_POST['currentEventImage']) ? $_POST['currentEventImage'] : '';
    }

    // Przygotuj zapytanie SQL do edycji wydarzenia
    $sql = "UPDATE events SET
            eventName = ?,
            eventDate = ?,
            eventDescription = ?,
            eventImage = ?
            WHERE eventId = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $eventName, $eventDate, $eventDescription, $eventImagePath, $eventId);

    // Wykonaj zapytanie edytujące wydarzenie
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