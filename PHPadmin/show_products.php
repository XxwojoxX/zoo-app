<?php
require_once "../PHP/connect.php";

$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

$sql = "SELECT productId, productImage, productName, productDescription, productPrice, productCategory FROM products";

$result = mysqli_query($connect, $sql);

if (!$result) {
    // Wyświetl błąd zapytania SQL (do debugowania)
    die('Invalid query: ' . mysqli_error($connect) . '<br>Query: ' . $sql);
}

$products = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['productId'];
        $productImage = $row['productImage'];
        $productName = $row['productName'];
        $productDescription = $row['productDescription'];
        $productPrice = $row['productPrice'];
        $productCategory = $row['productCategory'];

        $product = array(
            'id' => $productId,
            'image' => $productImage,
            'description' => $productDescription,
            'name' => $productName,
            'price' => $productPrice,
            'category' => $productCategory
        );
        $products[] = $product;
    }
} else {
    echo "No images found";
}

if (empty($products)) {
    echo "No animals found";
}

mysqli_close($connect);
?>