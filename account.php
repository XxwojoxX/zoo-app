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
    <script src="scripts/user_form.js"></script>
    <script src="scripts/delete_user.js"></script>
    <script src="scripts/autohide.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>ZOO</title>
</head>

<body>
    <div class="home">
        <header></header>

        <div class="menu">
            <button class="user-button" onclick="showForm('user-info')">
                <h2>Użytkownik</h2>
            </button>
            <button class="user-button" onclick="showForm('password-form')">
                <h2>Zmień hasło</h2>
            </button>
            <button class="user-button" onclick="showForm('username-form')">
                <h2>Zmień nazwę użytkownika</h2>
            </button>
            <button class="user-button" onclick="showForm('email-form')">
                <h2>Zmień e-mail</h2>
            </button>

            <div class="info" id="user-info">
                <?php
                require "PHP/account_info.php";

                echo '<div>';
                echo '<label for="username"><h2>Nazwa użytkownika: </h2></label>';
                echo '<h1 name="username">' . $user['name'] . '</h1><br>';
                echo '</div>';

                echo '<div>';
                echo '<label for="email"><h2>E-mail: </h2></label>';
                echo '<h1 name="email">' . $user['email'] . '</h1>';
                echo '</div>';
                ?>

                <button id="delete-button" onclick="showConfirmation()">Usuń konto</button>

                <div class="delete-confirm" id="delete-confirm">
                    <form action="PHP/delete_user.php" method="post" id="deleteForm">
                        <h1>Czy na pewno chcesz usunąć konto?</h1>
                        <p>Tej operacji nie będzie można cofnąć.</p>
                        <?php
                        require "PHP/account_info.php";

                        echo '<input type="hidden" name="userId" value="' . $user['id'] . '">';
                        ?>
                        <button type="submit" form="deleteForm">Tak</button>
                        <button type="button" onclick="cancelDeletion()">Nie</button>
                    </form>
                </div>
            </div>

            <div class="info" id="password-form">
                <form action="PHP/change_password.php" method="post" autocomplete="off">
                    <?php
                    require "PHP/account_info.php";

                    echo '<input type="hidden" name="userId" value="' . $user['id'] . '">';
                    ?>

                <div class="flex">
                    <div class="input-group">
                        <label for="oldPassword"><h2>Stare hasło</h2></label>
                        <input type="password" name="oldPassword" required>
                    </div>

                    <div class="input-group">
                        <label for="confirmPassword"><h2>Potwierdź hasło</h2></label>
                        <input type="password" name="confirmPassword" required>
                    </div>
                    </div>

                    <div class="flex">
                    <div class="input-group">
                        <label for="newPassword"><h2>Nowe hasło</h2></label>
                        <input type="password" name="newPassword" required>
                    </div>

                    <div class="input-group">
                        <label for="confirmNewPassword"><h2>Potwierdź nowe hasło</h2></label>
                        <input type="password" name="confirmNewPassword" required>
                    </div>
                    </div>

                    <button type="submit">Prześlij</button>
                </form>
            </div>

            <div class="info" id="username-form">
                <form action="PHP/change_username.php" method="post" autocomplete="off">
                    <?php
                    require "PHP/account_info.php";

                    echo '<input type="hidden" name="userId" value="' . $user['id'] . '">';
                    ?>

                    <label for="name"><h2>Nowa nazwa użytkownika: </h2></label>
                    <input type="text" name="newUsername" required><br>

                    <button type="submit">Prześlij</button>
                </form>
            </div>

            <div class="info" id="email-form">
                <form action="PHP/change_email.php" method="post" autocomplete="off">
                    <?php
                    require "PHP/account_info.php";

                    echo '<input type="hidden" name="userId" value="' . $user['id'] . '">';
                    ?>

                    <label for="email"><h2>Nowy e-mail: </h2></label>
                    <input type="email" name="newEmail" required><br>

                    <button type="submit">Prześlij</button>
                </form>
            </div>
        </div>

        <footer></footer>
    </div>
</body>

</html>