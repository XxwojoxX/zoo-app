<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "connect.php";

mysqli_report(MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        try {
            $connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

            $name = mysqli_real_escape_string($connect, $_POST['name']);
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $message = mysqli_real_escape_string($connect, $_POST['message']);

            $query = "INSERT INTO contact (contactName, contactEmail, contactMessage)
                    VALUES ('$name', '$email', '$message')";
            $results = mysqli_query($connect, $query);

            if ($results === true) {
                $_SESSION['success'] = true;
                header("Location: ../contact_form.php");
                exit(); // Zakończ skrypt, aby uniknąć dalszego wykonywania kodu
            } else {
                echo "Błąd wysyłania wiadomości: " . mysqli_error($connect);
            }

            mysqli_close($connect);
        } catch (Exception $e) {
            echo '<div class="error">Błąd serwera</div>';
            echo "<br>Info dev: " . $e->getCode();
        }
    } else {
        echo "Nieprawidłowe dane w formularzu.";
    }
} else {
    echo "Formularz nie został przesłany.";
}
?>
