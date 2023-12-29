<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-animal'])) {
        $deleteAnimalId = $_POST['deleteAnimalId'];

        // Przykładowe zapytanie SQL do usunięcia zwierzęcia o określonym ID
        require_once "../PHP/connect.php";

        $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

        if ($connect->connect_error) {
            die("Connection Failed: " . $connect->connect_error);
        }

        $query_delete_animal = "DELETE FROM animals WHERE animalId = ?";

        $stmt = $connect->prepare($query_delete_animal);
        $stmt->bind_param("i", $deleteAnimalId);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = true;
            header("Location: ../admin/admin_panel.php?success=1");
            exit();
        } else {
            echo "Błąd podczas wykonania zapytania: " . $stmt->error;
        }

        $stmt->close();
        $connect->close();
    }
}
?>