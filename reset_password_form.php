<?php
	session_start();
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="styles/media_form.css">

    <script src="scripts/Fetch_API.js"></script>
    <script src="scripts/autohide.js"></script>
    <script src="scripts/cookie.js"></script>

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