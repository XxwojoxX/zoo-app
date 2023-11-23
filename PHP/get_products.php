<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once "connect.php";

    $connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if(!$connect)
    {
        die("connection failed: ".mysqli_connect_error());
    }

    $sql = "SELECT productName, productDescription, productPrice, productImage FROM products";
    $result = mysqli_query($connect, $sql);

    $products = array();

    if($result && mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
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
    }
    else
    {
        echo "no products found";
    }

    mysqli_close($connect);
?>