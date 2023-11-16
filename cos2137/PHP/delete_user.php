<?php
    session_start();

    require_once "connect.php";

    $userId_do_usuniecia = $_POST['userId']; // Pobierz userId rekordu do usunięcia z formularza

    if ($userId_do_usuniecia == 1) {
        // Rekord z userId=1 jest niemożliwy do usunięcia
        echo "Nie możesz usunąć rekordu z userId=1.";
    } else {
        // Usuń rekord, jeśli userId nie jest równy 1
        $query = "DELETE FROM tabela WHERE userId = $userId_do_usuniecia";
        mysqli_query($connect, $query);
        echo "Rekord został usunięty.";
    }
?>