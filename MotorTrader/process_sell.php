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

    // Handle multiple image uploads
    $image_paths = [];
    $uploadDir = "Images/";

    foreach ($_FILES['carPhotos']['tmp_name'] as $key => $tmp_name) {
        $fileName = basename($_FILES['carPhotos']['name'][$key]);
        $targetFilePath = $uploadDir . $fileName;
        
        // Move uploaded file
        if (move_uploaded_file($tmp_name, $targetFilePath)) {
            $image_paths[] = $fileName;
        }
    }

    // Store images as comma-separated values
    $image_list = implode(",", $image_paths);

    // Insert into database
    $query = "INSERT INTO cars (make, model, year, mileage, price, description, image, registration, owners, fuel_type, body_type, engine, gearbox, doors) 
          VALUES ('$make', '$model', $year, $mileage, $price, '$description', '$image_list', '$registration', 1, '$fuel_type', '$body_type', '$engine', '$gearbox', $doors)";

    if (mysqli_query($conn, $query)) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
