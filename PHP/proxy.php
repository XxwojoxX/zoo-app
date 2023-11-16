<?php
// Sprawdzenie, czy klucz 'url' istnieje w tablicy $_GET
if (isset($_GET['url'])) {
    // Odkodowanie parametru 'url'
    $url = urldecode($_GET['url']);
    
    // Sprawdzenie, czy dane zostały poprawnie odczytane
    $data = file_get_contents($url);
    
    if ($data !== false) {
        echo $data;
    } else {
        echo "Błąd: Nie można odczytać danych z podanego URL.";
    }
} else {
    echo "Błąd: Parametr 'url' jest pusty lub nie został przekazany.";
}
?>
