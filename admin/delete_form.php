<!DOCTYPE html>
<html>
<head>
    <title>Usuwanie użytkownika</title>
</head>
<body>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteUserId'])) {
    $userId_do_usuniecia = $_POST['deleteUserId'];

    if ($userId_do_usuniecia == 1) {
        echo "Nie możesz usunąć rekordu z userId=1.";
    } else {
        try {
            require_once "../PHP/connect.php";

            $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

            if ($connect->connect_error) {
                die("Błąd połączenia z bazą danych: " . $connect->connect_error);
            }

            // Rozpocznij transakcję, aby zapewnić spójność danych
            $connect->begin_transaction();

            // Usuń rekordy z tabeli 'orders' dla danego 'userId'
            $query_delete_orders = "DELETE FROM orders WHERE userId = $userId_do_usuniecia";
            $connect->query($query_delete_orders);

            // Usuń rekord z tabeli 'users'
            $query_delete_user = "DELETE FROM users WHERE userId = $userId_do_usuniecia";
            $connect->query($query_delete_user);

            // Zatwierdź transakcję
            $connect->commit();

            echo "Rekord został usunięty wraz z powiązanymi rekordami z innych tabel.";

            // Zakończ połączenie z bazą danych
            $connect->close();
        } catch (Exception $e) {
            // W przypadku błędu anuluj transakcję
            $connect->rollback();

            echo "Błąd serwera: " . $e->getMessage();
            echo "blad serwera: " . $e->getCode();
        }
    }
}
?>

    <!-- Formularz do usuwania użytkownika na podstawie userId -->
    <form method="POST" action="">
        <label>Podaj userId do usunięcia:</label>
        <input type="number" name="deleteUserId" required>
        <button type="submit">Usuń użytkownika</button>
    </form>
</body>
</html>
