<?php
	session_start();
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

        <form class="form" id="reset-form" action="PHP/reset_password.php" method="POST" name="reset_form" autocomplete="off">
    <p class="title">Reset password</p>
    <p class="message">Podaj nowe hasło</p>

    <label>
        <input required="" placeholder="" type="password" class="input" name="new_password">
        <span>Nowe hasło</span>
    </label>

    <label>
        <input required="" placeholder="" type="password" class="input" name="confirm_password">
        <span>Potwierdź hasło</span>
    </label>

    <?php $resetToken = $_GET['token']; ?>
    <input type="hidden" name="token" value="<?php echo $resetToken; ?>">

    <button class="submit" name="reset-button">Submit</button>
    
</form>

<footer></footer>
    </div>
</body>

</html>