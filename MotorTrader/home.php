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
<html lang="en">
<head>
    <title>Home</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<div id="wrapper">
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

    <main>
        <form class="basic-search" action="#">
            <div class="inner-form">
                <div class="basic-search">
                    <input class="search" type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                </div>
                <div class="advanced-search">
                    <span class="desc">Car Search Form</span>
                    <div class="row1">
                        <div class="input-field"></div>
                    </div>
                    <div class="row2"></div>
                    <div class="row3"></div>
                </div>
            </div>
        </form>
    </main>

    <div class="car-listings">
    <?php while($car = mysqli_fetch_assoc($result)): ?>
        <div class="car-card">
            <a href="car_details.php?id=<?php echo $car['id']; ?>">
                <img src="Images/<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['make']); ?>" width="300">
            </a>
            <h2><?php echo htmlspecialchars($car['make']) . " " . htmlspecialchars($car['model']); ?></h2>
            <p><strong>Year:</strong> <?php echo htmlspecialchars($car['year']); ?></p>
            <p><strong>Mileage:</strong> <?php echo number_format($car['mileage']); ?> km</p>
            <p><strong>Price:</strong> $<?php echo number_format($car['price'], 2); ?></p>
            <a href="car.php?id=<?php echo $car['id']; ?>" class="details-btn">View Details</a>
        </div>
    <?php endwhile; ?>
</div>


    <footer class="footer">
    <div class="footer-con">
        <div class="footer-row">
            <div class="footer-col">
                <h2>MotorTrader</h2> <!-- I used h2 you can change it to h3 or..  -->
                <ul>
                    <li><a href="#">About MotorTrader</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Terms & conditions</a></li>
                    <li><a href="#">Privacy policies</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h2>Get Help</h2>
                <ul>
                    <li><a href="#">Help & FAQ</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#">Customer service</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h2>Details</h2>
                <ul>
                    <li><p>Bit by Bit</p></li>
                    <li><p>University of Huddersfield</p></li>
                    <li><p>Huddersfield, United Kingdom</p></li>
                </ul>
            </div>
            <div class="footer-col">
                <h2>Follow Us</h2>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
        </div>
    </div>
</footer>
 
</body>
</html>