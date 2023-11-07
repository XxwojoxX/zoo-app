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

        // Zapisz e-mail w bazie danych
        $query = "INSERT INTO users (userEmail) VALUES ('$email')";
        $result = mysqli_query($db, $query);

        if ($result) {
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
                $mail->setFrom('zoo.inz.test@gmail.com', 'cos');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Przypomnienie hasła';
                $mail->Body = 'Twoje hasło to: /n
                                twoja nazwa uzytkownika to: ';

                if ($mail->send()) {
                    header("Location: ../login_form.php?success=2");
                } else {
                    echo "Błąd wysyłania: " . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                echo "Błąd wysyłania: " . $e->getMessage();
            }
        } else {
            echo "Błąd zapisu e-maila do bazy danych: " . mysqli_error($db);
        }
    }
}
?>
