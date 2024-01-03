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
    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPrice = $_POST["productPrice"];
    $productCategory = $_POST["productCategory"];

    // Ustaw domyślną ścieżkę do obrazu
    $productImagePath = '';

    // Sprawdź, czy użytkownik wybrał nowy plik
    if (
        isset($_FILES['newProductImage']) &&
        $_FILES['newProductImage']['error'] == UPLOAD_ERR_OK &&
        is_uploaded_file($_FILES['newProductImage']['tmp_name'])
    ) {
        // Ścieżka do folderu, w którym przechowujesz obrazy
        $upload_dir = '../img/';

        // Przenoś plik z folderu tymczasowego do docelowego
        if (move_uploaded_file($_FILES['newProductImage']['tmp_name'], $upload_dir . $_FILES['newProductImage']['name'])) {
            // Ścieżka do zapisania w bazie danych
            $productImagePath = 'http://localhost/inx2/img/' . $_FILES['newProductImage']['name'];
        } else {
            echo "Błąd przy przesyłaniu pliku.";
            exit;
        }
    } else {
        // Użyj starego obrazu, jeśli nie ma nowego
        $productImagePath = isset($_POST['currentProductImage']) ? $_POST['currentProductImage'] : '';
    }

    // Przygotuj zapytanie SQL do aktualizacji danych w bazie
    $sql = "UPDATE products SET 
            productName = ?,
            productDescription = ?,
            productPrice = ?,
            productCategory = ?,
            productImage = ?
            WHERE productId = ?";

    // Przygotuj zapytanie SQL do wykonania
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi", $productName, $productDescription, $productPrice, $productCategory, $productImagePath, $productId);

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