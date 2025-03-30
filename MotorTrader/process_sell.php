<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $make = mysqli_real_escape_string($conn, $_POST['make']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $year = intval($_POST['year']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $registration = mysqli_real_escape_string($conn, $_POST['registration']);
    $mileage = intval($_POST['mileage']);
    $description = mysqli_real_escape_string($conn, $_POST['carDescription']);
    $fuel_type = mysqli_real_escape_string($conn, $_POST['fuelType']);
    $body_type = mysqli_real_escape_string($conn, $_POST['bodyType']);
    $engine = mysqli_real_escape_string($conn, $_POST['engine']);
    $gearbox = mysqli_real_escape_string($conn, $_POST['gearbox']);
    $doors = intval($_POST['doors']);

    $uploadDir = "Images/";
    $image_paths = [];

    foreach ($_FILES['carPhotos']['tmp_name'] as $key => $tmp_name) {
        $fileName = time() . "_" . basename($_FILES['carPhotos']['name'][$key]); // avoid overwrite
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($tmp_name, $targetPath)) {
            $image_paths[] = $fileName; // store filename only (not full path)
        }
    }

    $image_list = implode(",", $image_paths);

    // Insert into DB – NOTICE: no `image` column anymore
    $query = "INSERT INTO cars (make, model, year, mileage, price, description, registration, owners, fuel_type, body_type, engine, gearbox, doors, created_at, images) 
              VALUES ('$make', '$model', $year, $mileage, $price, '$description', '$registration', 1, '$fuel_type', '$body_type', '$engine', '$gearbox', $doors, NOW(), '$image_list')";

    if (mysqli_query($conn, $query)) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
