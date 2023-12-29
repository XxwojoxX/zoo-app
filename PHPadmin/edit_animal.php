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
    $animalId = $_POST["animalId"];
    $animalSpecies = $_POST["animalSpecies"];
    $animalDescription = $_POST["animalDescription"];
    $animalDiet = $_POST["animalDiet"];
    $animalFeeding = $_POST["animalFeeding"];

    // Sprawdź, czy plik został przesłany bez błędów
    if ($_FILES['newAnimalImage']['error'] != UPLOAD_ERR_OK) {
        echo "Błąd przy przesyłaniu pliku: " . $_FILES['newAnimalImage']['error'];
        exit;
    }

    // Odczytaj zawartość pliku
    $image = file_get_contents($_FILES['newAnimalImage']['tmp_name']);

    // Generuj unikalną nazwę pliku
    $file_name = uniqid() . '.jpg';

    // Ścieżka do folderu, w którym przechowujesz obrazy
    $upload_dir = '../img/';

    // Pełna ścieżka do zapisu pliku
    $file_path = $upload_dir . $file_name;

    // Zapisz plik na serwerze
    file_put_contents($file_path, $image);

    // Ścieżka do zapisania w bazie danych
    $animalImagePath = 'http://localhost/inx2/img/' . $file_name;

    // Przygotuj zapytanie SQL do aktualizacji danych w bazie
    $sql = "UPDATE animals SET 
            animalSpecies = ?,
            animalDescription = ?,
            animalDiet = ?,
            animalFeeding = ?,
            animalImage = ?
            WHERE animalId = ?";

    // Przygotuj zapytanie SQL do wykonania
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $animalSpecies, $animalDescription, $animalDiet, $animalFeeding, $animalImagePath, $animalId);

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