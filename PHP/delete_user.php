<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userId'])) {
        $userId_do_usuniecia = $_POST['userId'];

        try {
            require_once "../PHP/connect.php";

            $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

            if ($connect->connect_error) {
                die("Błąd połączenia z bazą danych: " . $connect->connect_error);
            }

            // Rozpocznij transakcję, aby zapewnić spójność danych
            $connect->begin_transaction();

            // Usuń rekordy z tabeli 'order_products' dla danego 'userId'
            $query_delete_order_products = "DELETE FROM order_products WHERE order_id IN (SELECT orderId FROM orders WHERE userId = $userId_do_usuniecia)";
            $connect->query($query_delete_order_products);

            // Usuń rekordy z tabeli 'orders' dla danego 'userId'
            $query_delete_orders = "DELETE FROM orders WHERE userId = $userId_do_usuniecia";
            $connect->query($query_delete_orders);

            // Usuń rekord z tabeli 'users'
            $query_delete_user = "DELETE FROM users WHERE userId = $userId_do_usuniecia";
            $connect->query($query_delete_user);

            // Zatwierdź transakcję
            $connect->commit();

            // Zniszcz sesję (wyloguj użytkownika)
            session_destroy();

            // Ustaw zmienną sesji success_message na true
            $_SESSION['success_message'] = true;

            // Przekieruj na stronę z komunikatem sukcesu lub inną stronę
            header("Location: ../index.php?success=1");
            exit();
        } catch (Exception $e) {
            // W przypadku błędu anuluj transakcję
            $connect->rollback();

            echo "Błąd serwera: " . $e->getMessage();
            echo "Błąd serwera: " . $e->getCode();
        } finally {
            // Zakończ połączenie z bazą danych
            $connect->close();
        }
    }
}
?>