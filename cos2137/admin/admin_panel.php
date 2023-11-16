<?php
session_start();

if (!isset($_SESSION['userId']) || $_SESSION['userId'] !== 1) {
    // Jeśli użytkownik nie jest zalogowany lub nie jest administratorem (userId różne od 1), przekieruj go na inną stronę lub wyświetl komunikat o braku dostępu.
    header("Location: ../index.php"); // Możesz przekierować na inną stronę lub wyświetlić komunikat.
    exit; // Zakończ działanie skryptu, aby zapobiec dalszemu wykonywaniu kodu.
}

header("Location: delete_form.php");
// Dalszy kod dla administratora
// Tutaj możesz umieścić zawartość strony dostępną tylko dla administratora.
?>