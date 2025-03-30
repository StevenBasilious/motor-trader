<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['FN']);
    $last_name = mysqli_real_escape_string($conn, $_POST['LN']);
    $email = mysqli_real_escape_string($conn, $_POST['Eml']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['PN']);
    $message = mysqli_real_escape_string($conn, $_POST['messageText']);

    // Insert into database
    $query = "INSERT INTO buyer_inquiries (first_name, last_name, email, phone_number, message, created_at) 
              VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$message', NOW())";

    if (mysqli_query($conn, $query)) {
        header("Location: successBuyer.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
