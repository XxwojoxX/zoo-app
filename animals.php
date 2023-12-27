<?php
session_start();
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/animals.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_animals.css">

    <script src="scripts/redirect.js"></script>
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
        <div class="sections">
            <div class="section1">
                <?php
                include "PHP/get_animals.php";
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
