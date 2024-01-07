<?php
session_start();

require_once "connect.php";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Pobierz dane z formularza
$userId = $_POST['userId'];
$newEmail = $_POST['newEmail'];

// Oczyść dane z ewentualnych znaków specjalnych lub kodu SQL
$userId = mysqli_real_escape_string($conn, $userId);
$newEmail = mysqli_real_escape_string($conn, $newEmail);

// Sprawdź, czy nowy email nie jest pusty
if (!empty($newEmail)) {
  // Znajdź rekord użytkownika w tabeli na podstawie userId
  $sql = "SELECT userEmail FROM users WHERE userId = '$userId'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // Sprawdź, czy nowy email nie jest taki sam jak email zapisany w bazie danych
    $row = mysqli_fetch_assoc($result);
    $dbEmail = $row['userEmail'];
    if ($newEmail != $dbEmail) {
      // Zmień email na nowy email i zaktualizuj rekord w tabeli
      $sql = "UPDATE users SET userEmail = '$newEmail' WHERE userId = '$userId'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        // Wyloguj użytkownika automatycznie
        session_destroy(); // Zakończ sesję
        session_unset(); // Usuń wszystkie zmienne sesyjne
        // Ustaw zmienną sesji, aby poinformować o pomyślnym działaniu
        $_SESSION['success_message'] = true;
        header("Location: ../login_form.php?success=1"); // Przekieruj do strony logowania
        exit; // Zakończ skrypt
      } else {
        // Wyświetl komunikat błędu
        echo "Nie udało się zmienić emaila. Spróbuj ponownie.";
      }
    } else {
      // Wyświetl komunikat błędu
      echo "Nowy email nie może być taki sam jak email zapisany w bazie danych.";
    }
  } else {
    // Wyświetl komunikat błędu
    echo "Nie udało się zmienić emaila. Spróbuj ponownie.";
  }
} else {
  // Wyświetl komunikat błędu
  echo "Nowy email nie może być pusty.";
}
?>