<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Początkowe zapytanie bez warunków
$sql = "SELECT productName, productDescription, productPrice, productImage FROM products";
$whereClauses = array();

// Dodaj warunek dla kategorii
if (isset($_GET['category']) && $_GET['category'] !== 'all') {
    $category = mysqli_real_escape_string($connect, $_GET['category']);
    $whereClauses[] = "productCategory = '$category'";
}

// Dodaj warunek dla zakresu cenowego
if (isset($_GET['min-price'], $_GET['max-price'])) {
    $minPrice = mysqli_real_escape_string($connect, $_GET['min-price']);
    $maxPrice = mysqli_real_escape_string($connect, $_GET['max-price']);

    if ($minPrice !== '' && $maxPrice !== '') {
        $whereClauses[] = "productPrice BETWEEN $minPrice AND $maxPrice";
    } elseif ($minPrice !== '') {
        $whereClauses[] = "productPrice >= $minPrice";
    } elseif ($maxPrice !== '') {
        $whereClauses[] = "productPrice <= $maxPrice";
    }
}

// Dodaj warunek dla sortowania
if (isset($_GET['sort']) && $_GET['sort'] !== 'default') {
    $sort = mysqli_real_escape_string($connect, $_GET['sort']);
    switch ($sort) {
        case 'price-asc':
            $orderBy = "ORDER BY productPrice ASC";
            break;
        case 'price-desc':
            $orderBy = "ORDER BY productPrice DESC";
            break;
        case 'alphabetical-asc':
            $orderBy = "ORDER BY productName ASC";
            break;
        case 'alphabetical-desc':
            $orderBy = "ORDER BY productName DESC";
            break;
        default:
            $orderBy = "";
            break;
    }
}

// Składanie ostatecznego zapytania
if (!empty($whereClauses)) {
    $sql .= " WHERE " . implode(" AND ", $whereClauses);
}

if (isset($orderBy)) {
    $sql .= " " . $orderBy;
}

$result = mysqli_query($connect, $sql);

if (!$result) {
    // Wyświetl błąd zapytania SQL (do debugowania)
    die('Invalid query: ' . mysqli_error($connect) . '<br>Query: ' . $sql);
}

$products = array();

while ($row = mysqli_fetch_assoc($result)) {
    $productName = $row['productName'];
    $productDescription = $row['productDescription'];
    $productPrice = $row['productPrice'];
    $productImage = $row['productImage'];

    $image = file_get_contents($productImage);
    $image_base64 = base64_encode($image);

    $product = array(
        'name' => $productName,
        'description' => $productDescription,
        'price' => $productPrice,
        'image' => 'data:image/png;base64,' . $image_base64
    );

    $products[] = $product;
}

if (empty($products)) {
    echo "No products found";
}

mysqli_close($connect);
?>