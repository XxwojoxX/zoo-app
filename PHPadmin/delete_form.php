<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteUsername'])) {
    $username_do_usuniecia = $_POST['deleteUsername'];

    try {
        require_once "../PHP/connect.php";

        $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

        if ($connect->connect_error) {
            die("Błąd połączenia z bazą danych: " . $connect->connect_error);
        }

        // Rozpocznij transakcję, aby zapewnić spójność danych
        $connect->begin_transaction();

        // Pobierz userId na podstawie nazwy użytkownika
        $query_get_user_id = "SELECT userId FROM users WHERE username = '$username_do_usuniecia'";
        $result = $connect->query($query_get_user_id);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId_do_usuniecia = $row['userId'];

            // Usuń rekordy z tabeli 'orders' dla danego 'userId'
            $query_delete_orders = "DELETE FROM orders WHERE userId = $userId_do_usuniecia";
            $connect->query($query_delete_orders);

            // Usuń rekord z tabeli 'users'
            $query_delete_user = "DELETE FROM users WHERE userId = $userId_do_usuniecia";
            $connect->query($query_delete_user);

            // Zatwierdź transakcję
            $connect->commit();

            header("Location: ../admin/admin_panel.php?success=1");
        } else {
            echo "Nie znaleziono użytkownika o nazwie: $username_do_usuniecia.";
        }

        // Zakończ połączenie z bazą danych
        $connect->close();
    } catch (Exception $e) {
        // W przypadku błędu anuluj transakcję
        $connect->rollback();

        echo "Błąd serwera: " . $e->getMessage();
        echo "Błąd serwera: " . $e->getCode();
    }
}
?>