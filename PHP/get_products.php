<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("connection failed: " . mysqli_connect_error());
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
if (isset($_GET['price-range'])) {
    $priceRange = explode('-', $_GET['price-range']);
    $maxPrice = isset($priceRange[1]) ? mysqli_real_escape_string($connect, $priceRange[1]) : '';
    if ($maxPrice !== '') {
        $whereClauses[] = "productPrice BETWEEN 0 AND $maxPrice";
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

if (mysqli_num_rows($result) > 0) {
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
} else {
    echo "no products found";
}

mysqli_close($connect);
?>