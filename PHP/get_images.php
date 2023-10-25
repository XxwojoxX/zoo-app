<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once "connect.php";

    $animalSpecies = $_GET['animalName'];
    $connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if(!$connect)
    {
        die("connection failed: ".mysqli_connect_error());
    }

    $sql = "SELECT animalImage, animalSpecies, animalDescription FROM animals WHERE animalSpecies = '$animalSpecies'";
    $result = mysqli_query($connect, $sql);

    $imageHTML = '';
    $nameHTML = '';

    $animals = array();

    if($result && mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $animalImage = $row['animalImage'];
            $animalSpecies = $row['animalSpecies'];
            $animalDescription = $row['animalDescription'];

            $image = file_get_contents($animalImage);
            $image_base64 = base64_encode($image);

            $animal = array(
                'image' => '<img src="data:img/png;base64,'. $image_base64 .'" alt="'. $animalSpecies .'">',
                'name' => '<h2 class="animalSpecies">'. $animalSpecies .'</h2>',
                'description' => '<p class="animalDescription">'. $animalDescription .'</p>'
            );
            $animals[] = $animal;
        }
    }
    else
    {
        echo "No images found";
    }

    mysqli_close($connect);
?>