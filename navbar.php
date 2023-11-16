<?php
session_start();

// Dodaj nagłówek CORS
header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo">ZOO</span></a>

        <ul class="navbar">
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="animals.php">Zwierzęta</a></li>
            <li><a href="events.php">Wydarzenia</a></li>
            <li><a href="about_us.php">O nas</a></li>
            <li><a href="shop.php">Sklep</a></li>
            <li><a href="contact_form.php">kontakt</a></li>
        </ul>

        <div class="log-reg">
            <?php
            if (isset($_SESSION['userName'])) {
                $userName = $_SESSION['userName'];
                echo
                    '<a href="PHP/logout.php">
                                <button class="log-reg-btn">Logout</button>
                            </a>';

                echo '<span class="username">' . $userName . '</span>';
                echo '<div class="background">
                <button class="menu__icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
                <ul class="menu__options">
                  <li><a href="orders.php">Zamówienia</a></li>
                  <li><a href="account.php">Konto</a></li>
                </ul>
              </div>';
            } else {
                echo
                    '<a href="login_form.php">
                                <button class="log-reg-btn">Login</button>
                            </a>';

                echo
                    '<a href="register_form.php">
                                <button class="log-reg-btn">Register</button>
                            </a>';
            }
            ?>
        </div>
    </header>
</body>

</html>