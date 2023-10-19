<?php
session_start();

include "PHP/get_events.php";
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <script src="scripts/Fetch_API.js"></script>
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
                <div class="content">

            <div class="event-container event-row">
        <?php
        foreach ($events as $event) {
            echo '<div class="event">';
            echo $event['name'];
            echo $event['date'];
            echo $event['image'];
            echo '</div>';
        }
        ?>
    </div>

    <div class="pagination">
        <?php
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $prevPage = $currentPage - 1;
        $nextPage = $currentPage + 1;

        // Wyświetl obie opcje "Następna strona" i "Poprzednia strona" jeśli to możliwe
        if ($prevPage > 0) {
            echo "<a href='?page=$prevPage' class='page-link'>Wstecz</a>";
        }

        if (count($events) == $eventsPerPage) {
            echo "<a href='?page=$nextPage' class='page-link'>Dalej</a>";
        }
        ?>
    </div>
            </div>
            </div>

        <footer></footer>
</body>

</html>