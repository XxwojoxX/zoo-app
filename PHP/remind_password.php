<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (empty($email)) {
        $_SESSION['given_email'] = $_POST['email'];
        header('Location: remind_password.php');
    } else {
        require_once "connect.php"; // Podmień to na swoje połączenie z bazą danych

        $db = new mysqli($db_host, $db_username, $db_password, $db_name);

        $email = htmlspecialchars($email);

        // Sprawdź, czy istnieje użytkownik o podanym adresie e-mail
        $checkUserQuery = "SELECT userId FROM users WHERE userEmail = '$email'";
        $checkUserResult = mysqli_query($db, $checkUserQuery);

        if ($checkUserResult && mysqli_num_rows($checkUserResult) > 0) {
            $userId = mysqli_fetch_assoc($checkUserResult)['userId'];

            // Wygeneruj unikalny token resetowania hasła
            $resetToken = bin2hex(random_bytes(32));

            // Ustaw datę wygaśnięcia (np. 1 godzina od teraz)
            $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

            // Zapisz token w bazie danych
            $insertTokenQuery = "INSERT INTO password_reset_tokens (user_id, token, expires_at) VALUES ($userId, '$resetToken', '$expiresAt')";
            $insertTokenResult = mysqli_query($db, $insertTokenQuery);

            if ($insertTokenResult) {
                try {
                    $mail = new PHPMailer();

                    $mail->isSMTP();

                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->SMTPAuth = true;

                    $mail->Username = 'zoo.inz.test@gmail.com';
                    $mail->Password = 'ywew cepu jfbk tjtc';

                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom('zoo.inz.test@gmail.com', 'test');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Resetowanie hasła';
                    $mail->Body = 'Aby zresetować hasło, kliknij <a href="http://localhost/cos/reset_password_form.php?token=' . $resetToken . '">tutaj</a>.';

                    if ($mail->send()) {
                        $_SESSION['success_message'] = true;
                        header("Location: ../remind_pass_form.php?success=1");
                    } else {
                        echo "Błąd wysyłania: " . $mail->ErrorInfo;
                    }
                } catch (Exception $e) {
                    echo "Błąd wysyłania: " . $e->getMessage();
                }
            } else {
                echo "Błąd zapisu tokenu do bazy danych: " . mysqli_error($db);
            }
        } else {
            echo "Użytkownik o podanym adresie e-mail nie istnieje.";
        }
    }
}
?>
