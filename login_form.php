<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION['userName'])) {
    header("Location: index.php");
}

//usuwanie bledow rejestracji
if (isset($_SESSION['e_nick']))
    unset($_SESSION['e_nick']);
if (isset($_SESSION['e_email']))
    unset($_SESSION['e_email']);
if (isset($_SESSION['e_password']))
    unset($_SESSION['e_password']);
if (isset($_SESSION['e_regulations']))
    unset($_SESSION['e_regulations']);
if (isset($_SESSION['e_bot']))
    unset($_SESSION['e_bot']);
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_form.css">

    <script src="scripts/autohide.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="scripts/cookie2.js"></script>
    <script src="scripts/Fetch_api.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>
</head>

<body>
    <div class="home">

    <header></header>

        <form class="form" id="login-form" action="PHP/login.php" method="POST" name="login_form" autocomplete="off">
            <?php
            // Sprawdź, czy zmienna sesji success_message jest ustawiona
            if (isset($_SESSION['success_message']) && $_SESSION['success_message'] === true) {
                echo '<div class="success-message" id="message">
                <h2>Operacja zakończona pomyślnie!</h2>
            </div>';

                // Usuń zmienną sesji, aby komunikat nie pojawił się po odświeżeniu strony
                unset($_SESSION['success_message']);
            }
            ?>

            <p class="title">Logowanie</p>
            <p class="message">Zaloguj się, aby uzyskać pełny dostęp do aplikacji</p>
            <?php
            if (isset($_SESSION['fail'])) {
                echo $_SESSION['fail'];
                unset($_SESSION['fail']);
            }
            ?>
            <label>
                <input required="" placeholder="" type="text" class="input" name="nick">
                <span>username</span>
            </label>

            <label>
                <input required="" placeholder="" type="password" class="input" name="password">
                <span>password</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="email">
                <span>Email</span>
            </label>

            <button class="submit">Wyślij</button>
            <p class="signin">Zapomniałeś hasła? <a href="remind_pass_form.php">Przypomnij</a> </p>
        </form>

        <footer></footer>
    </div>
</body>

</html>