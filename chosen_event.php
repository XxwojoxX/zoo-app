<?php
session_start();

if (isset($_GET['eventName'])) {
    $eventName = urldecode($_GET['eventName']);
} else {
    echo "nie znaleziono wydarzenia";
    exit;
}

include "PHP/get_events.php";

$selectedEvent = null;
foreach ($events as $event) {
    if ($event['name'] == $eventName) {
        $selectedEvent = $event;
        break;
    }
}

if (!$selectedEvent) {
    echo "nie znaleziono wydarzenia";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <script src="scripts/Fetch_API.js"></script>
    <script src="scripts/cookie.js"></script>
    <script src="scripts/redirect.js"></script>
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

        <div class="event-container event-row">
            <?php
            echo '<div id="chosen-event">';
            echo '<div class="event-name"><h1>' . $selectedEvent['name'] . '</h1></div>';
            echo '<div class="event-date">' . $selectedEvent['date'] . '</div>';
            echo '<div class="event-image" id="chosen-image">' . $selectedEvent['image'] . '</div>';
            echo '<div class="event-description">' . $selectedEvent['description'] . '</div>';
            echo '</div>';
            ?>
        </div>

        <footer></footer>
    </div>
</body>

</html>