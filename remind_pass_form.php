<?php
	session_start();

    if (isset($_SESSION['userName'])) {
        header("Location: login_form.php");
    }
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

        <form class="form" id="remind-form" action="PHP/remind_password.php" method="POST" name="remind_form" autocomplete="off">
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

            <p class="title">Remind password</p>
            <p class="message">Podaj email</p>

            <label>
                <input required="" placeholder="" type="text" class="input" name="email">
                <span>Email</span>
            </label>

            <button class="submit" name="remind-button">Submit</button>
        </form>

        <footer></footer>
    </div>
</body>

</html>