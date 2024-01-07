<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_POST['token'])) {
    $token = $_POST['token'];

    // Sprawdź, czy istnieje token w bazie danych
    require_once "connect.php"; // Połączenie z bazą danych

    $db = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $tokenQuery = "SELECT user_id, expires_at, token FROM password_reset_tokens WHERE token = ?";
    $stmt = $db->prepare($tokenQuery);
    $stmt->bind_param("s", $token);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $expiresAt, $dbToken);
            $stmt->fetch();

            if (time() < strtotime($expiresAt)) {
                // Token jest ważny, umożliw użytkownikowi wprowadzenie nowego hasła

                // Sprawdź, czy hasła są zgodne
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($newPassword === $confirmPassword) {
                    // Hasła są zgodne, możemy je zaktualizować w bazie danych

                    // Haszuj nowe hasło
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Zapisz nowe hasło w bazie danych dla użytkownika o danym ID ($userId)
                    $updatePasswordQuery = "UPDATE users SET userPassword = ? WHERE userId = ?";
                    $stmtUpdate = $db->prepare($updatePasswordQuery);
                    $stmtUpdate->bind_param("si", $hashedPassword, $userId);

                    if ($stmtUpdate->execute()) {
                        $_SESSION['success_message'] = true;
                        // Przekierowanie do strony logowania po pomyślnym zresetowaniu hasła
                        header("Location: ../login_form.php?success=1");
                        $deleteTokenQuery = "DELETE FROM password_reset_tokens WHERE token = ?";
                        $stmtDelete = $db->prepare($deleteTokenQuery);
                        $stmtDelete->bind_param("s", $dbToken);

                        if (!$stmtDelete->execute()) {
                            echo "Błąd usuwania tokenu z bazy danych: " . $stmtDelete->error;
                        }

                        $stmtDelete->close();
                        exit(); // Warto dodać exit, aby zapobiec kontynuowaniu wykonania kodu
                    } else {
                        echo "Błąd zapisu nowego hasła do bazy danych: " . $stmtUpdate->error;
                    }
                } else {
                    echo "Hasła nie są zgodne. Spróbuj ponownie.";
                }
            } else {
                echo "Token wygasł. Poproś o nowy link do resetowania hasła.";
            }
        } else {
            echo "Nieprawidłowy token resetowania hasła.";
        }
    } else {
        echo "Błąd zapytania do bazy danych: " . $stmt->error;
    }

    $stmt->close();
    $stmtUpdate->close();
    $stmtDelete->close();
    $db->close();
} else {
    echo "Brak wymaganego parametru token.";
}
?>