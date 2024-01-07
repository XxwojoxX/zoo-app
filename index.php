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

    <script src="scripts/cookie.js"></script>
    <script src="scripts/cookie2.js"></script>
    <script src="scripts/Fetch_api.js"></script>
    <script src="scripts/autohide.js"></script>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <section class="home">
        <header></header>

        <?php
            // Sprawdź, czy zmienna sesji success_message jest ustawiona
            if (isset($_SESSION['success_message']) && $_SESSION['success_message'] === true) {
                echo '<div class="success-message" id="message">
            <h2>Operacja zakończona pomyślnie!</h2>
          </div>';

                // Usuń zmienną sesji, aby komunikat nie pojawił się po odświeżeniu strony
                unset($_SESSION['success_message']);
            }
            ?>

        <div class="home-text">
            <h5>Witaj w naszym zoo!</h5>
            <h1>Odkryj fascynujący świat <br> zwierząt</h1>
            <p>Zapraszamy do fascynującej podróży po świecie przyrody, gdzie możesz odkrywać różnorodność <br>
                zwierząt. Nasze unikalne wystawy pozwalają Ci zanurzyć się w ich naturalnym środowisku. <br>
                Doświadcz niezapomnianych chwil i zgłębiaj tajemnice naszych podopiecznych. <br> </p>
        </div>

        <footer></footer>
    </section>
</body>

</html>