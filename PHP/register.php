<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    if(isset($_POST["Email"]))
    {
        $validation = true;

        $nick = $_POST['Nick'];
        $email = $_POST['Email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = $_POST['Password'];
        $confirmPassword = $_POST['ConfirmPassword'];

        if(strlen($nick) < 3 || (strlen($nick) > 20))
        {
            $validation = false;
            $_SESSION['e_nick'] = "Nazwa użytkownika musi mieć od 3 do 20 znaków";
        }
        else if(!ctype_alnum($nick))
        {
            $validation = false;
            $_SESSION['e_nick'] = "Nazwa użytkownika może zawierać tylko litery i cyfry bez polskich znaków";
        }

        if(filter_var($emailB, FILTER_VALIDATE_EMAIL) == false || ($emailB != $email))
        {
            $validation = false;
            $_SESSION['e_email'] = "Podaj prawidłowy email";
        }

        if((strlen($password) < 8) || (strlen($password) > 12))
        {
            $validation = false;
            $_SESSION['e_password'] = "Hasło musi mieć od 8 do 12 znaków";
        }

        if($password != $confirmPassword)
        {
            $validation = false;
            $_SESSION['e_confirmPassword'] = "Hasła muszą być takie same";
        }
        
        //checkbox
        if(!isset($_POST['regulations']))
        {
            $validation = false;
            $_SESSION['e_regulations'] = "Zaakceptuj regulamin";
        }

        //captcha
        $secret = "6LcvcAMoAAAAABUZfaaZp_vJfBlzz0K2LF15F4A1";
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

        $answer = json_decode($check);

        if($answer -> success == false)
        {
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
        
                // Znajdź najmniejszy dostępny wolny userId
                $query = "SELECT MIN(userId) AS min_id FROM users";
                $results = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($results);
                $min_id = $row['min_id'] ?? 0; // Jeśli nie znaleziono, przyjmij 0.
        
                // Jeśli nie znaleziono wolnego ID, przyjmij 1, w przeciwnym razie dodaj 1 do najmniejszego ID
                $next_id = $min_id === 0 ? 1 : $min_id + 1;
        
                // Wstaw rekord do bazy danych z najmniejszym dostępnym `userId`
                $query = "INSERT INTO users (userId, userName, userPassword, userEmail) VALUES ('$next_id', '$nick', '$password_hash', '$email')";
                
                if(mysqli_query($connect, $query))
                {
                    header("Location: ../login_form.php?success=1");
                    exit;
                }
                else
                {
                    echo "Błąd: " . mysqli_error($connect);
                }
            }
        
            mysqli_close($connect);
        } catch (Exception $e) {
            echo '<div class="error">Błąd serwera</div>';
            echo "<br>Info dev: ".$e -> getCode();
        }
        
        
        
        
        
        
        
        
    }
?>