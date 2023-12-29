<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accept-changes'])) {
        // Pobierz dane z formularza
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];

        try {
            require_once "../PHP/connect.php";

            $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

            if ($connect->connect_error) {
                die("Błąd połączenia z bazą danych: " . $connect->connect_error);
            }

            // Przygotuj zapytanie SQL do aktualizacji danych użytkownika z użyciem prepared statement
            $query_update_user = "UPDATE users SET userName = ?, userEmail = ? WHERE userId = ?";

            // Przygotuj prepared statement
            $stmt = $connect->prepare($query_update_user);

            // Związuj parametry
            $stmt->bind_param("ssi", $userName, $userEmail, $userId);

            // Wykonaj zapytanie
            if ($stmt->execute()) {
                // Ustaw zmienną sesji success_message na true
                $_SESSION['success_message'] = true;

                // Przekieruj na stronę z komunikatem sukcesu
                header("Location: ../admin/admin_panel.php?success=1");
                exit();
            } else {
                echo "Błąd podczas wykonania zapytania: " . $stmt->error;
            }

            // Zamknij statement
            $stmt->close();

            // Zakończ połączenie z bazą danych
            $connect->close();
        } catch (Exception $e) {
            echo "Błąd serwera: " . $e->getMessage();
            echo "Błąd serwera: " . $e->getCode();
        }
    }
}
?>