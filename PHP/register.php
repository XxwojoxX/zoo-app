<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_POST["Email"])) {
    $validation = true;

    $nick = $_POST['Nick'];
    $email = $_POST['Email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];

    // Sprawdzenie długości nazwy użytkownika
    if (strlen($nick) < 3 || (strlen($nick) > 20)) {
        $validation = false;
        $_SESSION['e_nick'] = "Nazwa użytkownika musi mieć od 3 do 20 znaków";
    } else if (!ctype_alnum($nick)) {
        $validation = false;
        $_SESSION['e_nick'] = "Nazwa użytkownika może zawierać tylko litery i cyfry bez polskich znaków";
    }
    // Dodaj sprawdzenie, czy nick nie jest jednym z określonych
    else if (strtolower($nick) === 'admin' || strtolower($nick) === 'administrator') {
        $validation = false;
        $_SESSION['e_nick'] = "Niedozwolona nazwa";
    }

    if (filter_var($emailB, FILTER_VALIDATE_EMAIL) == false || ($emailB != $email)) {
        $validation = false;
        $_SESSION['e_email'] = "Podaj prawidłowy email";
    }

    if ((strlen($password) < 8) || (strlen($password) > 12)) {
        $validation = false;
        $_SESSION['e_password'] = "Hasło musi mieć od 8 do 12 znaków";
    }
    // Dodaj sprawdzenie siły hasła
    else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,12}$/', $password)) {
        $validation = false;
        $_SESSION['e_password'] = "Hasło zbyt słabe";
    }

    if ($password != $confirmPassword) {
        $validation = false;
        $_SESSION['e_confirmPassword'] = "Hasła muszą być takie same";
    }

    // Checkbox
    if (!isset($_POST['regulations'])) {
        $validation = false;
        $_SESSION['e_regulations'] = "Zaakceptuj regulamin";
    }

    // Captcha
    $secret = "YOUR_SECRET_KEY";
    $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);

    $answer = json_decode($check);

    if ($answer->success == false) {
        $validation = false;
        $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem";
    }

    if (!$validation) {
        header("Location: ../register_form.php");
        exit;
    }

    require_once "connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $nick = mysqli_real_escape_string($connect, $nick);
            $email = mysqli_real_escape_string($connect, $email);

            // Sprawdzenie unikalności nazwy użytkownika w bazie danych
            $query = "SELECT userId FROM users WHERE userName = '$nick'";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                $validation = false;
                $_SESSION['e_nick'] = "Nazwa jest już zajęta";
            }

            // Sprawdzenie unikalności adresu email w bazie danych
            $query = "SELECT userId FROM users WHERE userEmail = '$email'";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                $validation = false;
                $_SESSION['e_email'] = "Adres email jest już zajęty";
            }

            // Jeśli istnieją błędy, wróć do formularza rejestracji
            if (!$validation) {
                header("Location: ../register_form.php");
                exit;
            }

            // Znajdź najmniejszy dostępny wolny userId
            $query = "SELECT userId FROM users ORDER BY userId ASC";
            $results = mysqli_query($connect, $query);

            $usedIds = array();
            while ($row = mysqli_fetch_assoc($results)) {
                $usedIds[] = $row['userId'];
            }

            // Funkcja do znalezienia najmniejszego dostępnego userId
            function findSmallestAvailableUserId($usedIds)
            {
                $count = count($usedIds);
                for ($i = 1; $i <= $count; $i++) {
                    if (!in_array($i, $usedIds)) {
                        return $i;
                    }
                }
                // Jeśli nie znaleziono wolnego ID w zakresie od 1 do $count, przyjmij $count + 1
                return $count + 1;
            }

            // Ustal najmniejszy dostępny userId
            $next_id = findSmallestAvailableUserId($usedIds);

            // Wstaw rekord do bazy danych z najmniejszym dostępnym userId
            $query = "INSERT INTO users (userId, userName, userPassword, userEmail) VALUES ('$next_id', '$nick', '$password_hash', '$email')";

            if (mysqli_query($connect, $query)) {
                $_SESSION['success_message'] = true;
                header("Location: ../login_form.php?success=1");
                exit;
            } else {
                echo "Błąd: " . mysqli_error($connect);
            }
        }

        mysqli_close($connect);
    } catch (Exception $e) {
        echo '<div class="error">Błąd serwera</div>';
        echo "<br>Info dev: " . $e->getCode();
    }
}
?>