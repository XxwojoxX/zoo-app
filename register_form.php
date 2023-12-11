<?php
	session_start();

    if(isset($_SESSION['userName']))
    {
        header("Location: index.php");
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>ZOO</title>

        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/form.css">
        <link rel="stylesheet" href="styles/media.css">
        <link rel="stylesheet" href="styles/media_form.css">

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="scripts/generator.js"></script>
        <script src="scripts/captcha.js"></script>
        <script src="scripts/cookie.js"></script>
        <script src="scripts/cookie2.js"></script>
    <script src="scripts/Fetch_api.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    </head>
    
    <body>
        <div class="home">
        <header></header>

            <form class="form" id="demo-form" method="POST" action="PHP/register.php" autocomplete="off">
                <p class="title">Register </p>
                    <label>
                        <input required="" placeholder="" class="input" type="text" name="Nick">

                        <span>Username*</span>

                        <?php
                            if(isset($_SESSION['e_nick']))
                            {
                                echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                                unset($_SESSION['e_nick']);
                            }
                        ?>
                    </label>
                        
                    <label>
                        <input required="" placeholder="" type="email" class="input" name="Email">

                        <span>Email*</span>

                        <?php
                                if(isset($_SESSION['e_email']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                                    unset($_SESSION['e_email']);
                                }
                            ?>
                    </label> 
                        
                    <input type="button" id="generator" class="log-reg-btn" value="Wygeneruj hasło"></input>

                    <div id="generated-password" class="generated-password">
                        <p id="password" class="password"></p>
                        <p id="copy-info" class="hidden">Hasło zostało skopiowane!</p>
                    </div>

                    <label>
                        <input required="" placeholder="" type="password" class="input" name="Password">
                        <span>Password*</span>

                        <?php
                            if(isset($_SESSION['e_password']))
                            {
                                echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                                unset($_SESSION['e_password']);
                            }
                        ?>
                    </label>

                    <label>
                        <input required="" placeholder="" type="password" class="input" name="ConfirmPassword">
                        <span>Confirm password*</span>

                        <?php
                            if(isset($_SESSION['e_confirmPassword']))
                            {
                                echo '<div class="error">'.$_SESSION['e_confirmPassword'].'</div>';
                                unset($_SESSION['e_confirmPassword']);
                            }
                        ?>
                    </label>

                    <label for="regulationsCheckBox">
                        <input type="checkbox" class="regulationsCheckBox" id="regulationsCheckBox" name="regulations">
                        <p>Accept regulations*</p>

                        <?php
                            if(isset($_SESSION['e_regulations']))
                            {
                                echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
                                unset($_SESSION['e_regulations']);
                            }
                        ?>
                    </label>

                    <div class="g-recaptcha" data-sitekey="6LcvcAMoAAAAAEyFz61T1G3Y4RQpLKT7QcgHl2Pk"></div>

                    <?php
                        if(isset($_SESSION['e_bot']))
                        {
                            echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                            unset($_SESSION['e_bot']);
                        }
                    ?>

                    <button class="submit">Submit</button>
                    
                    <p class="signin">Already have an acount ? <a href="login_form.php">Signin</a> </p>
            </form>

            <footer></footer>
        </div>
    </body>
</html>

<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>