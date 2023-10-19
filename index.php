<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZOO</title>

    <script src="scripts/Fetch_API.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

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
    <section class="home">
        <nav></nav>

        <div class="home-text">
            <h5>Lorem ipsum</h5>
            <h1>dolor sit <br> amet, consectetur</h1>
            <p>adipiscing elit, sed do eiusmod tempor <br>
                incididunt ut labore et dolore magna aliqua. Quis commodo odio aenean sed <br>
                adipiscing diam donec. Diam sollicitudin tempor id eu. Nisi vitae suscipit tellus <br> </p>
            <a href="shop.php" class="btn">Kup bilety</a>
        </div>

        <footer></footer>
    </section>
</body>

</html>