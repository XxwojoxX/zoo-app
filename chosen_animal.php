<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/animals.css">
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
        <div class="home">
            <nav></nav>

            <div class="imageContainer" id="imageContainer">
                <div class="ui-card0">
                    <?php
                        if(isset($_GET['animalName']))
                        {
                            $animalName = $_GET['animalName'];

                            include "PHP/get_images.php";

                            $animalsCount = count($animals);

                            for($i = 0; $i < $animalsCount; $i++)
                            {
                                echo "<p class='image'>".$animals[$i]['image']."</p>";
                            }
                        }
                        else
                        {
                            echo "brak zmiennej animalName w GET";
                            exit;
                        }
                    ?>
                </div>

                <div class="info-card">
                    <?php
                        if(isset($_GET['animalName']))
                        {
                            $animalName = $_GET['animalName'];

                            include "PHP/get_images.php";

                            $animalsCount = count($animals);

                            for($i = 0; $i < $animalsCount; $i++)
                            {
                                echo $animals[$i]['name'];
                            }
                        }
                        else
                        {
                            echo "brak zmiennej animalName w GET";
                            exit;
                        }
                    ?>
                </div>
            </div>

            <footer></footer>
        </div>
    </body>
</html>