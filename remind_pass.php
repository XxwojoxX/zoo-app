<?php
	session_start();
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_form.css">

    <script src="scripts/Fetch_API.js"></script>
    <script src="scripts/autohide.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var cookieMessage = document.getElementById("cookie-message");
            var acceptCookieButton = document.getElementById("accept-cookie");

            if (acceptCookieButton) {
                acceptCookieButton.addEventListener("click", function () {
                    // Tutaj możesz ustawić plik cookie 'cookieinfo' na 'true' po akceptacji zgody
                    // monster.set("cookieinfo", "true", 365); // Ustawia na 'true' na 365 dni

                    // Ukryj komunikat o plikach cookie po akceptacji
                    cookieMessage.style.display = "none";
                });
            }
        });
    </script>
</head>

<body>
    <div class="home">

        <nav></nav>

        <form class="form" id="remind-form" action="PHP/remind_password.php" method="POST" name="remind_form" autocomplete="off">
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<div class="remind-success" id="remind-success">
                                        <h2>wyslano wiadomosc na podany adres email</h2>
                                    </div>';
            }
            ?>

            <p class="title">Remind password</p>
            <p class="message">Podaj nazwe uzytkownika oraz email</p>

            <label>
                <input required="" placeholder="" type="text" class="input" name="nick">
                <span>username</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="email">
                <span>Email</span>
            </label>

            <button class="submit">Submit</button>
        </form>

        <footer></footer>
    </div>
</body>

</html>