<?php
require_once "../PHP/connect.php";

$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

$sql = "SELECT userId, userName, userEmail FROM users";

$result = mysqli_query($connect, $sql);

if (!$result) {
    // Wyświetl błąd zapytania SQL (do debugowania)
    die('Invalid query: ' . mysqli_error($connect) . '<br>Query: ' . $sql);
}

$users = array();

while ($row = mysqli_fetch_assoc($result)) {
    $userId = $row['userId'];
    $userName = $row['userName'];
    $userEmail = $row['userEmail'];

    $user = array(
        'id' => $userId,
        'login' => $userName,
        'email' => $userEmail
    );

    $users[] = $user;
}

if (empty($users)) {
    echo "No users found";
}

mysqli_close($connect);
?>