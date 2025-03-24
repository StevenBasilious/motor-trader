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
    <title>Sell Your Car - Motor Trader</title>
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

    <main>
        <section id="sell-car">
            <h2>Sell Your Car</h2>
            <form id="sellForm">
                <fieldset>
                    <legend>Find Your Car</legend>
                    <label for="registrationNumber">Registration Number:</label>
                    <input type="text" id="registrationNumber" name="registrationNumber" required>
                    <label for="currentMileage">Current Mileage:</label>
                    <input type="number" id="currentMileage" name="currentMileage" required>
                </fieldset>
                <fieldset>
                    <legend>Take Photos</legend>
                    <input type="file" id="carPhotos" name="carPhotos" accept="image/*" multiple required>
                </fieldset>
                <fieldset>
                    <legend>Car Description</legend>
                    <textarea id="carDescription" name="carDescription" rows="4" placeholder="Describe your car" required></textarea>
                </fieldset>
                <fieldset>
                    <legend>Seller Details</legend>
                    <label for="sellerNumber">Phone Number:</label>
                    <input type="tel" id="sellerNumber" name="sellerNumber" required>
                    <label for="sellerEmail">Email:</label>
                    <input type="email" id="sellerEmail" name="sellerEmail" required>
                    <label for="sellerLocation">Location:</label>
                    <input type="text" id="sellerLocation" name="sellerLocation" required>
                </fieldset>
                <fieldset>
                    <legend>Car Details</legend>
                    <label for="carMileage">Mileage:</label>
                    <input type="number" id="carMileage" name="carMileage" required>
                    <label for="registration">Registration:</label>
                    <input type="text" id="registration" name="registration" required>
                    <!-- <label for="owners">Number of Owners:</label>
                    <input type="number" id="owners" name="owners" required> -->
                    <label for="fuelType">Fuel Type:</label>
                    <input type="text" id="fuelType" name="fuelType" required>
                    <label for="bodyType">Body Type:</label>
                    <input type="text" id="bodyType" name="bodyType" required>
                    <label for="engine">Engine:</label>
                    <input type="text" id="engine" name="engine" required>
                    <label for="gearbox">Gearbox:</label>
                    <input type="text" id="gearbox" name="gearbox" required>
                    <label for="doors">Number of Doors:</label>
                    <input type="number" id="doors" name="doors" required>
                </fieldset>
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Motor Trader</p>
    </footer>
</div>    
</body>
</html>




