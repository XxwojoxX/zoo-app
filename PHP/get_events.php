<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("connection failed: " . mysqli_connect_error());
}

$eventsPerPage = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Pobierz numer strony z parametru GET

$offset = ($page - 1) * $eventsPerPage;
$sql = "SELECT * FROM events LIMIT $eventsPerPage OFFSET $offset";
$result = mysqli_query($connect, $sql);

$events = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventName = $row['eventName'];
        $eventDate = $row['eventDate'];
        $eventDescription = $row['eventDescription'];
        $eventImage = $row['eventImage'];

        $image = file_get_contents($eventImage);
        $image_base64 = base64_encode($image);

        $event = array(
            'name' => '<h1 class="eventName">' . $eventName . '</h1>',
            'date' => '<h3 class="eventDate">' . $eventDate . '</h3>',
            'description' => '<p class="eventDescription">' . $eventDescription . '</p>',
            'image' => '<img src="data:img/jpg;base64,' . $image_base64 . '" alt="' . $eventName . '">'
        );
        $events[] = $event;
    }
} else {
    echo "no events found";
}

mysqli_close($connect);
