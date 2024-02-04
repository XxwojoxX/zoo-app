<?php
	session_start();
?>

<!DOCTYPE html>
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

            <form class="form" method="POST" action="PHP/contact.php" autocomplete="off">
                <p class="title">Skontaktuj się z nami</p>
                    <label>
                        <input required="" placeholder="" type="text" class="input" name="name">
                        <span>Name</span>
                    </label>
                        
                <label>
                    <input required="" placeholder="" type="email" class="input" name="email">
                    <span>Email</span>
                </label> 

                <label>
                    <textarea required="" class="input" type="textarea" name="message"></textarea>
                </label>

                <button class="submit">Wyślij</button>

                <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] === true)
                    {
                        echo '<div class="message" id="message">
                                <p>Wiadomość została wysłana</p>
                            </div>';
                        // Usuń zmienną sesji po wyświetleniu komunikatu
                        unset($_SESSION['success']);
                    }
                ?>
            </form>

            <footer></footer>
        </div>
    </body>
</html>