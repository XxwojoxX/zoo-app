<?php
session_start();

if (!isset($_SESSION['userName'])) {
    header("Location: login_form.php");
}
?>

<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/media.css">

        <script src="scripts/cookie.js"></script>
        <script src="scripts/cookie2.js"></script>
    <script src="scripts/Fetch_api.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <title>ZOO</title>
    </head>

    <body>
    <header></header>

        <h1>STRONA W BUDOWIE</h1>

        <footer></footer>
    </body>
</html>