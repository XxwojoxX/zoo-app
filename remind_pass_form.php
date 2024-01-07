<?php
	session_start();

    if (isset($_SESSION['userName'])) {
        header("Location: login_form.php");
    }
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_form.css">

    <script src="scripts/autohide.js"></script>
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

        <form class="form" id="remind-form" action="PHP/remind_password.php" method="POST" name="remind_form" autocomplete="off">
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<div class="remind-success" id="message">
                                        <h2>wyslano wiadomosc na podany adres email</h2>
                                    </div>';
            }
            ?>

            <p class="title">Remind password</p>
            <p class="message">Podaj email</p>

            <label>
                <input required="" placeholder="" type="text" class="input" name="email">
                <span>Email</span>
            </label>

            <button class="submit" name="remind-button">Submit</button>
        </form>

        <footer></footer>
    </div>
</body>

</html>