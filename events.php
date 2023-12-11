<?php
session_start();

include "PHP/get_events.php";
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <script src="scripts/cookie.js"></script>
    <script src="scripts/cookie2.js"></script>
    <script src="scripts/redirect.js"></script>
    <script src="scripts/Fetch_api.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>
</head>

<body>
    <div class="home">
    <header></header>
        <div class="content">

            <div class="event-container event-row">
                <?php
                foreach ($events as $event) {
                    echo '<div class="event">';
                    echo '<div class="event-name" onclick="redirectToEventPage(\'' . htmlspecialchars($event['name'], ENT_QUOTES, 'UTF-8') . '\')"><h1>' . $event['name'] . '</h1></div>';
                    echo $event['date'];
                    echo '<div class="event-image">' . $event['image'] . '</div>';
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