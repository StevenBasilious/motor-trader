<?php
session_start(); // Start the session at the very top
include 'database.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (!empty($email) && !empty($password)) {
        // Prepare a SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $name, $hashed_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, store user info in session
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name; // Store the user's name in the session
                header("Location: home.php"); // Redirect to home page
                exit(); // Ensure no further code is executed
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that email address.";
        }
        $stmt->close();
    } else {
        echo "Please fill in all fields.";
    }
    $conn->close();
}
?>