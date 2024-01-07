<?php
session_start();

require_once "connect.php";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Pobierz dane z formularza
$userId = $_POST['userId'];
$newUsername = $_POST['newUsername'];

// Oczyść dane z ewentualnych znaków specjalnych lub kodu SQL
$userId = mysqli_real_escape_string($conn, $userId);
$newUsername = mysqli_real_escape_string($conn, $newUsername);

// Sprawdź, czy nowa nazwa użytkownika nie jest pusta
if (!empty($newUsername)) {
  // Znajdź rekord użytkownika w tabeli na podstawie userId
  $sql = "SELECT userName FROM users WHERE userId = '$userId'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // Sprawdź, czy nowa nazwa użytkownika nie jest taka sama jak nazwa użytkownika zapisana w bazie danych
    $row = mysqli_fetch_assoc($result);
    $dbUsername = $row['userName'];
    if ($newUsername != $dbUsername) {
      // Zmień nazwę użytkownika na nową nazwę użytkownika i zaktualizuj rekord w tabeli
      $sql = "UPDATE users SET userName = '$newUsername' WHERE userId = '$userId'";
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
        echo "Nie udało się zmienić nazwy użytkownika. Spróbuj ponownie.";
      }
    } else {
      // Wyświetl komunikat błędu
      echo "Nowa nazwa użytkownika nie może być taka sama jak nazwa użytkownika zapisana w bazie danych.";
    }
  } else {
    // Wyświetl komunikat błędu
    echo "Nie udało się zmienić nazwy użytkownika. Spróbuj ponownie.";
  }
} else {
  // Wyświetl komunikat błędu
  echo "Nowa nazwa użytkownika nie może być pusta.";
}
?>