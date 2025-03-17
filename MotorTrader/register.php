<?php
include 'database.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Validate input
    if (!empty($uname) && !empty($email) && !empty($phone) && !empty($password)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare a SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $uname, $email, $hashed_password, $phone);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: account.html"); // Redirect to login page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Please fill in all fields.";
    }
    $conn->close();
}
?>