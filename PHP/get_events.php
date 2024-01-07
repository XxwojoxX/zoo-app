<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$eventsPerPage = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $eventsPerPage;

$sql = "SELECT * FROM events ORDER BY eventId DESC LIMIT ? OFFSET ?";
$stmt = mysqli_prepare($connect, $sql);

mysqli_stmt_bind_param($stmt, "ii", $eventsPerPage, $offset);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$events = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventName = htmlspecialchars($row['eventName'], ENT_QUOTES, 'UTF-8');
        $eventDate = $row['eventDate'];
        $eventDescription = $row['eventDescription'];
        $eventImage = $row['eventImage'];

        $event = array(
            'name' => $eventName,
            'date' => '<h3 class="eventDate">' . $eventDate . '</h3>',
            'description' => '<p class="eventDescription">' . $eventDescription . '</p>',
            'image' => '<img src="' . $eventImage . '" alt="' . $eventName . '">'
        );
        $events[] = $event;
    }
} else {
    echo "Nie znaleziono wydarzenia";
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>