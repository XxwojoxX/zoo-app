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

            echo '<div>';
            echo '<label for="username">Nazwa: </label>';
            echo '<input type="text" name="userName" value="' . $user['login'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<label for="email">E-mail: </label>';
            echo '<input type="text" name="userEmail" value="' . $user['email'] . '">';
            echo '</div>';

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
                <div>
                    <label for="userName">Nazwa użytkownika</label>
                    <input type="text" name="userName" required>
                </div>

                <div>
                    <label for="userPassword">Hasło</label>
                    <input type="password" name="userPassword" required>
                </div>

                <div>
                    <label for="userEmail">E-mail</label>
                    <input type="email" name="userEmail" required>
                </div>

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

            echo '<div>';
            echo '<label for="animalSpecies">Gatunek</label>';
            echo '<input type="text" name="animalSpecies" value="' . $animal['species'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<label for="animalDescription">Opis</label>';
            echo '<textarea name="animalDescription" required>' . $animal['description'] . '</textarea>';
            echo '</div>';

            echo '<div>';
            echo '<label for="animalDiet">Pożywienie</label>';
            echo '<input type="text" name="animalDiet" value="' . $animal['diet'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<label for="animalFeeding">Czas karmienia</label>';
            echo '<input type="text" name="animalFeeding" value="' . $animal['feeding'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<label for="newAnimalImage">Zdjęcie</label>';
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
        <form action="../PHPadmin/add_animal.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="info">
                <div>
                    <label for="animalSpecies">Gatunek:</label>
                    <input type="text" name="animalSpecies" required>
                </div>

                <div>
                    <label for="animalDescription">Opis:</label>
                    <textarea name="animalDescription" required></textarea>
                </div>

                <div>
                    <label for="animalDiet">Dieta:</label>
                    <input type="text" name="animalDiet" required>
                </div>

                <div>
                    <label for="animalFeeding">Godziny karmienia:</label>
                    <input type="text" name="animalFeeding" required>
                </div>

                <div>
                    <label for="animalImage">Zdjęcie:</label>
                    <input type="file" name="animalImage" accept="image/*" required>
                </div>

                <button type="submit" name="add-animal" id="add-button">Dodaj zwierzę</button>
            </div>
        </form>
    </div>

    <div class="form-container" id="product-form">
        <?php
        require "../PHPadmin/show_products.php";

        echo '<button class="admin-button" onclick="showForm(\'add-product-form\')">Dodaj produkt</button>';

        foreach ($products as $product) {
            echo '<div class="info">';

            echo '<form action="../PHPadmin/edit_products.php" method="post" enctype="multipart/form-data" autocomplete="off">';
            echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';

            echo '<div>';
            echo '<label for="productName">Nazwa</label>';
            echo '<input type="text" name="productName" value="' . $product['name'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<label for="productDescription">Opis</label>';
            echo '<textarea name="productDescription" required>' . $product['description'] . '</textarea>';
            echo '</div>';

            echo '<div>';
            echo '<label for="productPrice">Cena:</label>';
            echo '<input type="text" name="productPrice" value="' . $product['price'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<label for="productCategory">Kategoria:</label>';
            echo '<input type="text" name="productCategory" value="' . $product['category'] . '">';
            echo '</div>';

            echo '<div>';
            echo '<img src="' . $product['image'] . '" alt="Product Image">';
            echo '<input type="file" name="newProductImage" accept="image/*">';
            echo '<input type="hidden" name="currentProductImage" value="' . $product['image'] . '">';
            echo '</div>';

            echo '<button type="submit" id="accept-button" name="accept-changes">Zatwierdź zmiany</button>';
            echo '</form>';

            echo '<form action="../PHPadmin/delete_products.php" method="post">';
            echo '<input type="hidden" name="deleteproductId" value="' . $product['id'] . '">';
            echo '<button type="submit" id="delete-button" name="delete-animal">Usuń produkt</button>';
            echo '</form>';

            echo '</div>';
        }
        ?>

    </div>

    <div class="form-container" id="add-product-form">
        <form action="../PHPadmin/add_product.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="info">
                <div>
                <label for="productName">Nazwa:</label>
                <input type="text" name="productName" required>
                </div>

                <div>
                <label for="productDescription">Opis:</label>
                <input type="text" name="productDescription" required>
                </div>

                <div>
                <label for="productPrice">Cena:</label>
                <input type="number" name="productPrice" required>
                </div>

                <div>
                <label for="productCategory">Kategoria:</label>
                <input type="text" name="productCategory" required>
                </div>

                <div>
                <label for="productImage">Zdjęcie:</label>
                <input type="file" name="productImage" accept="image/*" required>
                </div>

                <button type="submit" name="add-product" id="add-button">Dodaj product</button>
            </div>
        </form>
    </div>

    <div class="form-container" id="order-form">
        <?php
        require "../PHPadmin/show_orders.php";

        echo '<button class="admin-button" onclick="showForm(\'add-order-form\')">Dodaj zamówienie</button>';

        foreach ($orders as $order) {
            echo '<div class="info">';

            echo '<form action="../PHPadmin/edit_orders.php" method="post" autocomplete="off">';
            echo '<input type="hidden" name="orderId" value="' . $order['id'] . '">';

            echo '<div>';
            echo '<label for="username">Nazwa Użytkownika:</label>';
            echo '<input type="text" name="userName" value="' . $order['userName'] . '" readonly><br>';
            echo '</div>';

            echo '<div>';
            echo '<label for="orderDeliveryStreet">Adres dostawy:</label>';
            echo '<input type="text" name="orderDeliveryStreet" value="' . $order['orderDeliveryStreet'] . '"><br>';
            echo '</div>';

            echo '<div>';
            echo '<label for="orderDeliveryOption">Opcja dostawy:</label>';
            echo '<input type="text" name="orderDeliveryOption" value="' . $order['orderDeliveryOption'] . '"><br>';
            echo '</div>';

            echo '<div>';
            echo '<label for="orderPaymentMethod">Metoda płatności:</label>';
            echo '<input type="text" name="orderPaymentMethod" value="' . $order['orderPaymentMethod'] . '"><br>';
            echo '</div>';

            echo '<div>';
            echo '<label for="dataZamowienia">Data zamówienia:</label>';
            echo '<input type="text" name="dataZamowienia" value="' . $order['dataZamowienia'] . '"><br>';
            echo '</div>';

            echo '<div>';
            echo '<label for="orderDeliveryLocal">Lokal dostawy:</label>';
            echo '<input type="text" name="orderDeliveryLocal" value="' . $order['orderDeliveryLocal'] . '"><br>';
            echo '</div>';

            echo '<div>';
            echo '<label for="orderStatus">Status zamówienia:</label>';
            echo '<input type="text" name="orderStatus" value="' . $order['orderStatus'] . '"><br>';
            echo '</div>';

            echo '<button type="submit" id="accept-button" name="accept-changes">Zatwierdź zmiany</button>';
            echo '</form>';

            echo '<form action="../PHPadmin/delete_orders.php" method="post">';
            echo '<input type="hidden" name="deleteOrderId" value="' . $order['id'] . '">';
            echo '<button type="submit" id="delete-button" name="delete-order">Usuń zamówienie</button>';
            echo '</form>';

            echo '</div>';
        }
        ?>
    </div>

    <div class="form-container" id="add-order-form">
        <form action="../PHPadmin/add_orders.php" method="post" autocomplete="off">
            <div class="info">

                <div>
                    <label for="username">Nazwa Użytkownika:</label>
                    <input type="text" name="username" required>
                </div>

                <div>
                    <label for="orderDeliveryStreet">Adres dostawy:</label>
                    <input type="text" name="orderDeliveryStreet" required>
                </div>

                <div>
                    <label for="orderDeliveryOption">Opcja dostawy:</label>
                    <input type="text" name="orderDeliveryOption" required>
                </div>

                <div>
                    <label for="orderPaymentMethod">Metoda płatności:</label>
                    <input type="text" name="orderPaymentMethod" required>
                </div>

                <div>
                    <label for="orderDeliveryLocal">Lokal dostawy:</label>
                    <input type="text" name="orderDeliveryLocal" required>
                </div>

                <div>
                    <label for="orderStatus">Status zamówienia:</label>
                    <input type="text" name="orderStatus" required>
                </div>

                <button type="submit" name="add-order" id="add-button">Dodaj zamówienie</button>
            </div>
        </form>
    </div>

    <div class="form-container" id="event-form">
        <?php
        require "../PHPadmin/show_events.php";

        echo '<button class="admin-button" onclick="showForm(\'add-event-form\')">Dodaj wydarzenie</button>';

        foreach ($events as $event) {
            echo '<div class="info">';

            echo '<form action="../PHPadmin/edit_events.php" method="post" enctype="multipart/form-data" autocomplete="off">';
            echo '<input type="hidden" name="eventId" value="' . $event['id'] . '">';

            echo '<div>';
            echo '<label for="eventName">Nazwa:</label>';
            echo '<input type="text" name="eventName" value="' . $event['name'] . '" required>';
            echo '</div>';

            echo '<div>';
            echo '<label for="eventDate">Data Wydarzenia:</label>';
            echo '<input type="datetime-local" name="eventDate" value="' . date('Y-m-d\TH:i', strtotime($event['date'])) . '" required>';
            echo '</div>';

            echo '<div>';
            echo '<label for="eventDescription">Opis Wydarzenia:</label>';
            echo '<textarea name="eventDescription" required>' . $event['description'] . '</textarea>';
            echo '</div>';

            echo '<div>';
            echo '<label for="newEventImage">Zdjęcie</label>';
            echo '<img src="' . $event['image'] . '" alt="Event Image">';
            echo '<input type="file" name="newEventImage" accept="image/*">';
            echo '<input type="hidden" name="currentEventImage" value="' . $event['image'] . '">';
            echo '</div>';

            echo '<button type="submit" id="accept-button" name="accept-changes">Zatwierdź zmiany</button>';
            echo '</form>';

            echo '<form action="../PHPadmin/delete_events.php" method="post">';
            echo '<input type="hidden" name="deleteEventId" value="' . $event['id'] . '">';
            echo '<button type="submit" id="delete-button" name="delete-event">Usuń Wydarzenie</button>';
            echo '</form>';

            echo '</div>';
        }
        ?>
    </div>

    <!-- Plik: add_event_form.php -->
    <div class="form-container" id="add-event-form">
        <form action="../PHPadmin/add_events.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="info">
                <div>
                    <label for="eventName">Nazwa Wydarzenia:</label>
                    <input type="text" name="eventName" required>
                </div>

                <div>
                    <label for="eventDate">Data Wydarzenia:</label>
                    <input type="datetime-local" name="eventDate" required>
                </div>

                <div>
                    <label for="eventDescription">Opis Wydarzenia:</label>
                    <textarea name="eventDescription" rows="4" required></textarea>
                </div>

                <div>
                    <label for="eventImage">Zdjęcie:</label>
                    <input type="file" name="eventImage" accept="image/*" required>
                </div>

                <div>
                    <button type="submit" name="add-event" id="add-button">Dodaj Wydarzenie</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>