<?php
require_once "../PHP/connect.php";

$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

$sql = "SELECT orders.orderId, users.userName, orders.orderDeliveryStreet, orders.orderDeliveryOption, 
               orders.orderPaymentMethod, orders.Data_zamówienia, 
               orders.orderDeliveryLocal, orders.orderStatus
        FROM orders
        JOIN users ON orders.userId = users.userId";

$result = mysqli_query($connect, $sql);

if (!$result) {
    // Wyświetl błąd zapytania SQL (do debugowania)
    die('Invalid query: ' . mysqli_error($connect) . '<br>Query: ' . $sql);
}

$orders = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orderId = $row['orderId'];
        $userName = $row['userName'];
        $orderDeliveryStreet = $row['orderDeliveryStreet'];
        $orderDeliveryOption = $row['orderDeliveryOption'];
        $orderPaymentMethod = $row['orderPaymentMethod'];
        $dataZamowienia = $row['Data_zamówienia'];
        $orderDeliveryLocal = $row['orderDeliveryLocal'];
        $orderStatus = $row['orderStatus'];

        $order = array(
            'id' => $orderId,
            'userName' => $userName,
            'orderDeliveryStreet' => $orderDeliveryStreet,
            'orderDeliveryOption' => $orderDeliveryOption,
            'orderPaymentMethod' => $orderPaymentMethod,
            'dataZamowienia' => $dataZamowienia,
            'orderDeliveryLocal' => $orderDeliveryLocal,
            'orderStatus' => $orderStatus
        );
        $orders[] = $order;
    }
} else {
    echo "No orders found";
}

if (empty($orders)) {
    echo "No orders found";
}

mysqli_close($connect);
?>