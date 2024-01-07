<?php
require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['userId'])) {
    echo "User not logged in";
    exit;
}

$currentUserId = $_SESSION['userId'];

$sql = "SELECT userId, userName, userEmail FROM users WHERE userId = $currentUserId";
$result = mysqli_query($connect, $sql);

$users = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userId = $row['userId'];
        $userName = $row['userName'];
        $userEmail = $row['userEmail'];

        $user = array(
            'id' => $userId,
            'name' => $userName,
            'email' => $userEmail
        );
        $users[] = $user;
    }
} else {
    echo "No users found";
}

mysqli_close($connect);
?>