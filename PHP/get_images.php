<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once "connect.php";

    $animalName = $_GET['animalName'];
    $connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if(!$connect)
    {
        die("connection failed: ".mysqli_connect_error());
    }

    $sql = "SELECT animalImage, animalName FROM animals WHERE animalName = '$animalName'";
    $result = mysqli_query($connect, $sql);

    $imageHTML = '';
    $nameHTML = '';

    $animals = array();

    if($result && mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $animalImage = $row['animalImage'];
            $animalName = $row['animalName'];

            $image = file_get_contents($animalImage);
            $image_base64 = base64_encode($image);

            $animal = array(
                'image' => '<img src="data:img/png;base64,'. $image_base64 .'" alt="'. $animalName .'">',
                'name' => '<h2 class="animalName">'. $animalName .'</h2>'
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