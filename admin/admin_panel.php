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
    <button class="adminButton" onclick="showForm('deleteUserForm')">Usuń użytkownika</button>
    <button class="adminButton" onclick="showForm('addAnimalForm')">Dodaj zwierzę</button>
    <button class="adminButton" onclick="showForm('editAnimalForm')">Edytuj zwierzę</button>
    <!-- Dodaj inne przyciski, jeśli są potrzebne -->
</div>

<div class="form-container">
<form id="deleteUserForm" method="POST" action="../PHPadmin/delete_form.php" autocomplete="off">
    <label>Podaj nazwę użytkownika do usunięcia:</label>
    <input type="text" name="deleteUsername" required>
    <button type="submit">Usuń użytkownika</button>
</form>
</div>

<div class="form-container">
<form id="addAnimalForm" action="../PHPadmin/add_animal.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <label>Gatunek zwierzęcia</label>
    <input type="text" name="animalSpecies">
    <label>Opis zwierzęcia</label>
    <input type="text" name="animalDescription">
    <label>Imię zwierzęcia</label>
    <input type="text" name="animalName">
    <label>Pożywienie</label>
    <input type="text" name="animalDiet">
    <label>Godziny karmienia</label>
    <input type="text" name="animalFeeding">
    <label>Zdjęcie zwierzęcia</label>
    <input type="file" name="animalImage" accept=".jpg, .jpeg">

    <button type="submit">Dodaj zwierzę</button>
</form>

<div class="form-container">
<form id="editAnimalForm" action="../PHPadmin/edit_animal.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <label>Gatunek zwierzęcia</label>
    <input type="text" name="animalSpecies">
    <label>Opis zwierzęcia</label>
    <input type="text" name="animalDescription">
    <label>Imię zwierzęcia</label>
    <input type="text" name="animalName">
    <label>Pożywienie</label>
    <input type="text" name="animalDiet">
    <label>Godziny karmienia</label>
    <input type="text" name="animalFeeding">
    <label>Zdjęcie zwierzęcia</label>
    <input type="file" name="animalImage" accept=".jpg, .jpeg">

    <button type="submit">Edytuj zwierzę</button>
</form>
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