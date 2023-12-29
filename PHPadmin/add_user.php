<?php
session_start();

require_once "../PHP/connect.php";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $userEmail = $_POST['userEmail'];
    $userName = $_POST['userName'];
    $userPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (userName, userPassword, userEmail) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userName, $userPassword, $userEmail);

    if($stmt->execute()) {
        $_SESSION['success_message'] = true;

        header("Location: ../admin/admin_panel.php?success=1");
        exit;
    } else {
        echo "Błąd: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>