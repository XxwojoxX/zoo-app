<?php
session_start();
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/animals.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_animals.css">

    <script src="scripts/Fetch_API.js"></script>
    <script src="scripts/redirect.js"></script>
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

        <div class="sections">
            <div class="section1">
                <div class="ui-card">
                    <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Lew Afrykański</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('lew')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Tygrys Bengalski</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('tygrys')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Słoń Afrykański</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('slon')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Pingwin Cesarski</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('pingwin')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>żyrafa Siatkowana</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('zyrafa')">Sprawdź</a>
                    </div>
                </div>
            </div>

            <div class="section2">
                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Gepard</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('gepard')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Krokodyl Nilowy</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('krokodyl')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Flaming Różowy</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('flaming')">Sprawdź</a>
                    </div>
                </div>

                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Panda Wielka</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('panda')">Sprawdź</a>
                    </div>
                </div>
                <div class="ui-card">
                <img src="img/no_photo.jpg">
                    <div class="description">
                        <h3>Wilk Szary</h3>
                        <a href="javascript:void(0);" onclick="redirectToAnimalPage('wilk')">Sprawdź</a>
                    </div>
                </div>
            </div>
        </div>

        <footer></footer>
    </div>
</body>

</html>