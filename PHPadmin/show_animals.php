<?php
require_once "../PHP/connect.php";

$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($connect->connect_error) {
    die("Connection Failed: " . $connect->connect_error);
}

$sql = "SELECT animalId, animalSpecies, animalDescription, animalDiet, animalFeeding, animalImage FROM animals";

$result = mysqli_query($connect, $sql);

if (!$result) {
    // Wyświetl błąd zapytania SQL (do debugowania)
    die('Invalid query: ' . mysqli_error($connect) . '<br>Query: ' . $sql);
}

$animals = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $animalId = $row['animalId'];
        $animalImage = $row['animalImage'];
        $animalSpecies = $row['animalSpecies'];
        $animalDescription = $row['animalDescription'];
        $animalDiet = $row['animalDiet'];
        $animalFeeding = $row['animalFeeding'];

        $image = file_get_contents($animalImage);
        $image_base64 = base64_encode($image);

        $animal = array(
            'id' => $animalId,
            'image' => 'data:img/jpg;base64,' . $image_base64,
            'description' => $animalDescription,
            'species' => $animalSpecies,
            'diet' => $animalDiet,
            'feeding' => $animalFeeding
        );
        $animals[] = $animal;
    }
} else {
    echo "No images found";
}

if (empty($animals)) {
    echo "No animals found";
}

mysqli_close($connect);
?>