<?php
session_start();
include "PHP/animals_data.php";
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
    <nav></nav>
    <div class="home">
        <div class="sections">
            <div class="section1">
                <?php
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $animalsPerPage = 4; // Liczba zwierząt na stronie
                $startIndex = ($currentPage - 1) * $animalsPerPage;
                
                $animalsToDisplay = array_slice($animals, $startIndex, $animalsPerPage);

                foreach ($animalsToDisplay as $animal) {
                    echo '<div class="ui-card">';
                    echo '<img src="' . $animal['image'] . '">';
                    echo '<div class="description">';
                    echo '<h3>' . $animal['name'] . '</h3>';
                    echo '<a href="javascript:void(0);" onclick="redirectToAnimalPage(\'' . $animal['name'] . '\')">Sprawdź</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="pagination">
                <?php
                $totalPages = ceil(count($animals) / $animalsPerPage);
                if ($currentPage > 1) {
                    echo "<a href='?page=" . ($currentPage - 1) . "' class='page-link'>Wstecz</a>";
                }
                if ($currentPage < $totalPages) {
                    echo "<a href='?page=" . ($currentPage + 1) . "' class='page-link'>Dalej</a>";
                }
                ?>
            </div>
        </div>
        <footer></footer>
    </div>
</body>

</html>
