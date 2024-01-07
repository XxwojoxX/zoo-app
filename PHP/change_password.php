<?php
session_start();

require_once "connect.php";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Pobierz dane z formularza
$userId = $_POST['userId'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

// Oczyść dane z ewentualnych znaków specjalnych lub kodu SQL
$userId = mysqli_real_escape_string($conn, $userId);
$oldPassword = mysqli_real_escape_string($conn, $oldPassword);
$newPassword = mysqli_real_escape_string($conn, $newPassword);
$confirmPassword = mysqli_real_escape_string($conn, $confirmPassword);
$confirmNewPassword = mysqli_real_escape_string($conn, $confirmNewPassword);

// Sprawdź, czy stare hasło i potwierdzone hasło są takie same, i czy nie są puste
if ($oldPassword == $confirmPassword && !empty($oldPassword)) {
  // Znajdź rekord użytkownika w tabeli na podstawie userId
  $sql = "SELECT userPassword FROM users WHERE userId = '$userId'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // Sprawdź, czy stare hasło zgadza się z hasłem zapisanym w bazie danych
    $row = mysqli_fetch_assoc($result);
    $dbPassword = $row['userPassword'];
    if (password_verify($oldPassword, $dbPassword)) {
      // Sprawdź, czy nowe hasło i potwierdzone nowe hasło są takie same, i czy nie są puste
      if ($newPassword == $confirmNewPassword && !empty($newPassword)) {
        // Zmień hasło użytkownika na nowe hasło i zaktualizuj rekord w tabeli
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Użyj funkcji password_hash do szyfrowania hasła
        $sql = "UPDATE users SET userPassword = '$newPassword' WHERE userId = '$userId'";
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
          echo "Nie udało się zmienić hasła. Spróbuj ponownie.";
        }
      } else {
        // Wyświetl komunikat błędu
        echo "Nowe hasło i potwierdzone nowe hasło muszą być takie same i nie mogą być puste.";
      }
    } else {
      // Wyświetl komunikat błędu
      echo "Podane stare hasło jest nieprawidłowe.";
    }
  } else {
    // Wyświetl komunikat błędu
    echo "Nie znaleziono użytkownika o podanym identyfikatorze.";
  }
} else {
  // Wyświetl komunikat błędu
  echo "Stare hasło i potwierdzone hasło muszą być takie same i nie mogą być puste.";
}
?>