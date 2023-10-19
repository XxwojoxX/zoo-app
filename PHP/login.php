<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "connect.php";

try {
    $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($connect->connect_errno != 0) {
        throw new Exception("Błąd połączenia z bazą danych: " . $connect->connect_error);
    }

    $nick = $_POST['nick'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Użyj przygotowanego zapytania SQL z parametrami
    $sql = "SELECT * FROM users WHERE userName=? AND userEmail=?";

    if ($stmt = $connect->prepare($sql)) {
        // Zwiąż zmienne z parametrami
        $stmt->bind_param("ss", $nick, $email);

        // Wykonaj zapytanie
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $storedPasswordHash = $row['userPassword'];

                if (password_verify($password, $storedPasswordHash)) {
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['userName'] = $row['userName'];

                    $stmt->close();
                    $connect->close();
                    header('Location: ../index.php');
                    exit;
                }
            }
        }
        $stmt->close();
    }

    // W przypadku błędu lub nieprawidłowych danych
    $_SESSION['fail'] = '<span style="color: red">Nieprawidłowe dane logowania</span>';
    $connect->close();
    header('Location: ../login_form.php');
} catch (Exception $e) {
    // Obsługa wyjątków - przechwytywanie i obsługa błędów
    $_SESSION['fail'] = '<span style="color: red">Wystąpił błąd: ' . $e->getMessage() . '</span>';
    header('Location: ../login_form.php');
}
?>