<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sprawdź, czy parametr productName został przekazany w URL
if (isset($_GET['productName'])) {
    $productName = mysqli_real_escape_string($connect, $_GET['productName']);

    // Zmodyfikowany zapytanie SQL, aby pobrać tylko wybrany produkt
    $sql = "SELECT productName, productDescription, productPrice, productImage FROM products WHERE productName = '$productName'";
    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $productName = $row['productName'];
        $productDescription = $row['productDescription'];
        $productPrice = $row['productPrice'];
        $productImage = $row['productImage'];

        $image = file_get_contents($productImage);
        $image_base64 = base64_encode($image);

        // Zapisz informacje o wybranym produkcie w zmiennej sesji
        $_SESSION['chosenProduct'] = array(
            'name' => $productName,
            'description' => $productDescription,
            'price' => $productPrice,
            'image' => 'data:image/png;base64,' . $image_base64
        );
    } else {
        // Ustaw zmienną sesji na błąd, jeśli produkt nie został znaleziony
        $_SESSION['chosenProductError'] = 'Product not found';
    }
} else {
    // Ustaw zmienną sesji na błąd, jeśli nazwa produktu nie została przekazana
    $_SESSION['chosenProductError'] = 'Product name not provided';
}

mysqli_close($connect);
?>
