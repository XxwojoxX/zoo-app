<?php
session_start();

if (!isset($_SESSION['userId']) || $_SESSION['userId'] !== 1) {
    // Jeśli użytkownik nie jest zalogowany lub nie jest administratorem (userId różne od 1), przekieruj go na inną stronę lub wyświetl komunikat o braku dostępu.
    header("Location: ../index.php"); // Możesz przekierować na inną stronę lub wyświetlić komunikat.
    exit; // Zakończ działanie skryptu, aby zapobiec dalszemu wykonywaniu kodu.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin_panel.css">
    <script src="../scripts/autohide.js"></script>
    <script src="../scripts/admin_form.js"></script>
    <title>Admin Panel</title>
</head>
<body>
    <!-- Panel administracyjny po lewej stronie -->
    <div id="adminPanel">
        <button class="adminButton" onclick="showForm('user-form')">Użytkownik</button>
        <button class="adminButton" onclick="showForm('animal-form')">Zwierzęta</button>
        <button class="adminButton" onclick="showForm('product-form')">Produkty</button>
        <button class="adminButton" onclick="showForm('order-form')">Zamówienia</button>
        <button class="adminButton" onclick="showForm('event-form')">Wydarzenia</button>
        <!-- Dodaj inne przyciski, jeśli są potrzebne -->
    </div>

    <div class="form-container" id="user-form">
    <?php
    require "../PHPadmin/show_users.php";

    echo '<button class="admin-button" onclick="showForm(\'add-user-form\')">Dodaj użytkownika</button>';

    foreach ($users as $user) {
        echo '<div class="info">';

        echo '<form action="../PHPadmin/edit_user.php" method="post" autocomplete="off">';
        echo '<input type="hidden" name="userId" value="' . $user['id'] . '">';
        echo '<input type="text" name="userName" value="' . $user['login'] . '">';
        echo '<input type="text" name="userEmail" value="' . $user['email'] . '">';
        echo '<button id="accept-button" name="accept-changes">Zatwierdź zmiany</button>';
        echo '</form>';

        echo '<form action="../PHPadmin/delete_user.php" method="post">';
        echo '<input type="hidden" name="deleteUsername" value="' . $user['login'] . '">';
        echo '<button id="delete-button" name="delete-user">Usuń użytkownika</button>';
        echo '</form>';

        echo '</div>';
    }
    ?>
    </div>

    <div class="form-container" id="add-user-form" autocomplete="off">
        <form action="../PHPadmin/add_user.php" method="post">
            <div class="info">
                <label for="userName">Nazwa użytkownika</label>
                <input type="text" name="userName" required>

                <label for="userPassword">Hasło</label>
                <input type="password" name="userPassword" required>

                <label for="userEmail">E-mail</label>
                <input type="email" name="userEmail" required>

                <button type="submit" name="add-user" id="add-button">Dodaj użytkownika</button>
            </div>
        </form>
    </div>

    <div class="form-container" id="animal-form">
    <?php
    require "../PHPadmin/show_animals.php";

    echo '<button class="admin-button" onclick="showForm(\'add-animal-form\')">Dodaj zwierzę</button>';

    foreach ($animals as $animal) {
        echo '<div class="info">';

        echo '<form action="../PHPadmin/edit_animal.php" method="post" enctype="multipart/form-data" autocomplete="off">';
        echo '<input type="hidden" name="animalId" value="' . $animal['id'] . '">';
        echo '<input type="text" name="animalSpecies" value="' . $animal['species'] . '">';
        echo '<input type="text" name="animalDescription" value="' . $animal['description'] . '">';
        echo '<input type="text" name="animalDiet" value="' . $animal['diet'] . '">';
        echo '<input type="text" name="animalFeeding" value="' . $animal['feeding'] . '">';
        echo '<div>';
        echo '<img src="' . $animal['image'] . '" alt="Animal Image">';
        echo '<input type="file" name="newAnimalImage" accept="image/*">';
        echo '</div>';
        echo '<button type="submit" id="accept-button" name="accept-changes">Zatwierdź zmiany</button>';
        echo '</form>';

        echo '<form action="../PHPadmin/delete_animal.php" method="post">';
        echo '<input type="hidden" name="deleteAnimalId" value="' . $animal['id'] . '">';
        echo '<button type="submit" id="delete-button" name="delete-animal">Usuń zwierzę</button>';
        echo '</form>';

        echo '</div>';
    }
    ?>

</div>

<div class="form-container" id="add-animal-form">
    <form action="../PHPadmin/add_animal.php" method="post" enctype="multipart/form-data">
        <div class="info">
        <label for="animalSpecies">Gatunek:</label>
        <input type="text" name="animalSpecies" required>

        <label for="animalDescription">Opis:</label>
        <input type="text" name="animalDescription" required>

        <label for="animalDiet">Dieta:</label>
        <input type="text" name="animalDiet" required>

        <label for="animalFeeding">Godziny karmienia:</label>
        <input type="text" name="animalFeeding" required>

        <label for="animalImage">Zdjęcie:</label>
        <input type="file" name="animalImage" accept="image/*" required>

        <button type="submit" name="add-animal" id="add-button">Dodaj zwierzę</button>
        </div>
    </form>
</div>

<div class="form-container" id="product-form">
    <?php
    require "../PHPadmin/show_products.php";

    echo '<button class="admin-button" onclick="showForm(\'add-product-form\')">Dodaj produkt</button>';

    foreach ($animals as $animal) {
        echo '<div class="info">';

        echo '<form action="../PHPadmin/edit_animal.php" method="post" enctype="multipart/form-data" autocomplete="off">';
        echo '<input type="hidden" name="animalId" value="' . $animal['id'] . '">';
        echo '<input type="text" name="animalSpecies" value="' . $animal['species'] . '">';
        echo '<input type="text" name="animalDescription" value="' . $animal['description'] . '">';
        echo '<input type="text" name="animalDiet" value="' . $animal['diet'] . '">';
        echo '<input type="text" name="animalFeeding" value="' . $animal['feeding'] . '">';
        echo '<div>';
        echo '<img src="' . $animal['image'] . '" alt="Animal Image">';
        echo '<input type="file" name="newAnimalImage" accept="image/*">';
        echo '</div>';
        echo '<button type="submit" id="accept-button" name="accept-changes">Zatwierdź zmiany</button>';
        echo '</form>';

        echo '<form action="../PHPadmin/delete_animal.php" method="post">';
        echo '<input type="hidden" name="deleteAnimalId" value="' . $animal['id'] . '">';
        echo '<button type="submit" id="delete-button" name="delete-animal">Usuń zwierzę</button>';
        echo '</form>';

        echo '</div>';
    }
    ?>

</div>

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
</div>
</body>
</html>