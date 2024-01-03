<?php
require_once "../PHP/connect.php";

$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

$sql = "SELECT eventId, eventName, eventDate, eventDescription, eventImage FROM events";

$result = mysqli_query($connect, $sql);

if (!$result) {
    // Wyświetl błąd zapytania SQL (do debugowania)
    die('Invalid query: ' . mysqli_error($connect) . '<br>Query: ' . $sql);
}

$events = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventId = $row['eventId'];
        $eventImage = $row['eventImage'];
        $eventName = $row['eventName'];
        $eventDate = $row['eventDate'];
        $eventDescription = $row['eventDescription'];

        $event = array(
            'id' => $eventId,
            'image' => $eventImage,
            'name' => $eventName,
            'date' => $eventDate,
            'description' => $eventDescription
        );
        $events[] = $event;
    }
} else {
    echo "No images found";
}

if (empty($events)) {
    echo "No events found";
}

mysqli_close($connect);
?>