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
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPrice = $_POST["productPrice"];
    $productCategory = $_POST["productCategory"];

    // Sprawdź, czy plik został przesłany bez błędów
    if ($_FILES['productImage']['error'] != UPLOAD_ERR_OK) {
        echo "Błąd przy przesyłaniu pliku: " . $_FILES['productImage']['error'];
        exit;
    }

    // Ścieżka do folderu, w którym przechowujesz obrazy
    $upload_dir = '../img/';

    // Pełna ścieżka do zapisu pliku
    $file_path = $upload_dir . basename($_FILES['productImage']['name']);

    // Przenoś plik z folderu tymczasowego do docelowego
    if (move_uploaded_file($_FILES['productImage']['tmp_name'], $file_path)) {
        // Ścieżka do zapisania w bazie danych
        $productImagePath = 'http://localhost/inx2/img/' . basename($_FILES['productImage']['name']);

        // Przygotuj zapytanie SQL do dodania danych do bazy
        $sql = "INSERT INTO products (productName, productDescription, productPrice, productCategory, productImage) VALUES (?, ?, ?, ?, ?)";

        // Przygotuj zapytanie SQL do wykonania
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiss", $productName, $productDescription, $productPrice, $productCategory, $productImagePath);

        // Wykonaj zapytanie i sprawdź, czy się udało
        if ($stmt->execute()) {
            // Ustaw zmienną sesji, aby poinformować o pomyślnym działaniu
            $_SESSION['success_message'] = true;

            // Przekieruj po zakończeniu przetwarzania
            header("Location: ../admin/admin_panel.php?success=1");
            exit;
        } else {
            echo "Błąd: " . $stmt->error;
        }

        // Zamknij przygotowane zapytanie
        $stmt->close();
    } else {
        echo "Błąd przy przesyłaniu pliku.";
    }
}

// Zamknij połączenie z bazą danych
$conn->close();
?>