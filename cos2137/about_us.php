<?php
	session_start();
?>

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

    <body id="themeBody">
        <nav></nav>

        <section class="home">
            <section class="about-us">
                <h1>O Nas</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.
                </p>
                <p>
                    Sed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.
                </p>
                <p>
                    Sed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.
                </p>
                <p>
                    Fusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.
                </p>
                <p>
                    Sed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.
                </p>
                <p>
                    Fusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.
                </p>
                <p>
                    Fusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.
                </p>
                <p>
                    Sed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.
                </p>
            </section>
        </section>

        <footer></footer>
    </body>
</html>