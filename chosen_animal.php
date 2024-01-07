<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/animals.css">
        <link rel="stylesheet" href="styles/media.css">

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

            <div class="imageContainer" id="imageContainer">
                <div class="ui-card0">
                    <?php
                        if(isset($_GET['animalName']))
                        {
                            $animalName = $_GET['animalName'];

                            include "PHP/get_chosen_animal.php";

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

                            include "PHP/get_chosen_animal.php";

                            $animalsCount = count($animals);

                            for($i = 0; $i < $animalsCount; $i++)
                            {
                                echo $animals[$i]['name'] . '<br>';
                                echo $animals[$i]['diet'];
                                echo $animals[$i]['feeding'];
                                echo '<p>' . $animals[$i]['description'] . '</p>';
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