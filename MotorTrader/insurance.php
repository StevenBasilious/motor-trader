<?php
// Start the session at the very top of the script
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include("database.php");

// Fetch all cars from the database
$query = "SELECT * FROM cars ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
<title></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="wrapper">
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="home.php"><img src="Images/logo.png" alt="Motor Trade Logo"></a>
        </div>
        <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="buy.php">Buy Car</a></li>
                <li><a href="sell.php">Sell Car</a></li>
                <li><a href="insurance.php">Car Insurance</a></li>
                <li><a href="mot.php">MOT Services</a></li>
            </ul>
        <div class="login-btn">
            <?php if (isset($_SESSION['user_name'])): ?>
                <span>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="logout.php">Logout</a> <!-- Add a logout link -->
            <?php else: ?>
                <a href="account.html">Account</a>
            <?php endif; ?>
        </div>
    </nav>


</header>
</div>    
</body>
</html>