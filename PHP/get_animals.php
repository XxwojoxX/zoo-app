<?php
require_once "connect.php";

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT animalImage, animalSpecies, animalDescription, animalDiet, animalFeeding FROM animals";
$result = mysqli_query($connect, $sql);

$animals = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $animalImage = $row['animalImage'];
        $animalSpecies = $row['animalSpecies'];
        $animalDescription = $row['animalDescription'];
        $animalDiet = $row['animalDiet'];
        $animalFeeding = $row['animalFeeding'];

        $image = file_get_contents($animalImage);
        $image_base64 = base64_encode($image);

        $animal = array(
            'image' => 'data:img/png;base64,' . $image_base64,
            'name' => $animalSpecies,
            'description' => $animalDescription,
            'diet' => $animalDiet,
            'feeding' => $animalFeeding
        );
        $animals[] = $animal;
    }
} else {
    echo "No images found";
}

mysqli_close($connect);
?>
