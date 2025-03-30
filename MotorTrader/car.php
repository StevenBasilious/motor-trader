<?php
// Start the session
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include("database.php");

// Check if an ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $car_id = $_GET['id'];

    // Fetch car details
    $query = "SELECT * FROM cars WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $car_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // If car found, fetch details
    if ($car = mysqli_fetch_assoc($result)) {
        // Car found, display details
     // Ensure 'images' exists before exploding
     if (!empty($car['images'])) {
        $images = explode(',', $car['images']);
    } else {
        $images = []; // Set to empty array to prevent errors
    }
} else {
    echo "<h2>Car not found</h2>";
    exit;
}
} else {
echo "<h2>Invalid Car ID</h2>";
exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($car['make'] . " " . $car['model']); ?> - Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .car-image {
            max-width: 100%;
            border-radius: 10px;
        }
        .details {
            margin-top: 20px;
            text-align: left;
            padding: 20px;
        }
        .details h2 {
            margin-bottom: 10px;
            color: #333;
        }
        .details p {
            font-size: 16px;
            color: #666;
            margin: 8px 0;
        }
        .price {
            font-size: 24px;
            font-weight: bold;
            color: #d9534f;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background: #0056b3;
        }
        .container.img {
            background color:red;
        }
        .image-slider {
    position: relative;
    max-width: 500px;
    margin: auto;
    overflow: hidden;
    border-radius: 10px;
}

.slider-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.slide {
    width: 100%;
    max-height: 400px;
    display: none;
    border-radius: 10px;
    transition: opacity 0.5s ease-in-out;
}

/* Show first image by default */
.slide.active {
    display: block;
}

/* Navigation Buttons */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 20px;
}

.prev { left: 10px; }
.next { right: 10px; }

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

    </style>
</head>

<body>

<nav class="navbar">
        <div class="logo">
            <a href="home.php"><img src="Images/logo.png" alt="Motor Trade Logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="sell.php">Sell Car</a></li>
            <li><a href="insurance.php">Car Insurance</a></li>
            <li><a href="Reviews.php">Reviews</a></li>
            </ul>
            
            <div class="login-btn">
            <?php if (isset($_SESSION['user_name'])): ?>
                <span>Hello, <?= htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="logout.php">Logout</a>
                <?php else: ?>
                <a href="account.html">Account</a>
            <?php endif; ?>
        </div>
    </nav>

<div class="container">
<div class="image-slider">
    <div class="slider-container">
        <?php foreach ($images as $index => $image): ?>
            <img class="slide <?php echo $index === 0 ? 'active' : ''; ?>" src="Images/<?php echo trim(htmlspecialchars($image)); ?>" alt="Car Image">
        <?php endforeach; ?>
    </div>

    <!-- Navigation Buttons -->
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
</div>


    
    <div class="details">
        <h2><?php echo htmlspecialchars($car['make']) . " " . htmlspecialchars($car['model']); ?> (<?php echo htmlspecialchars($car['year']); ?>)</h2>
        <p class="price">$<?php echo number_format($car['price'], 2); ?></p>
        <p><strong>Mileage:</strong> <?php echo htmlspecialchars($car['mileage']); ?> km</p>
        <p><strong>Registration:</strong> <?php echo htmlspecialchars($car['registration'] ?? 'N/A'); ?></p>
        <p><strong>Number of Owners:</strong> <?php echo htmlspecialchars($car['owners'] ?? 'N/A'); ?></p>
        <p><strong>Fuel Type:</strong> <?php echo htmlspecialchars($car['fuel_type'] ?? 'N/A'); ?></p>
        <p><strong>Body Type:</strong> <?php echo htmlspecialchars($car['body_type'] ?? 'N/A'); ?></p>
        <p><strong>Engine:</strong> <?php echo htmlspecialchars($car['engine'] ?? 'N/A'); ?></p>
        <p><strong>Gearbox:</strong> <?php echo htmlspecialchars($car['gearbox'] ?? 'N/A'); ?></p>
        <p><strong>Number of Doors:</strong> <?php echo htmlspecialchars($car['doors'] ?? 'N/A'); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($car['description']); ?></p>
        
        <a class="back-btn" href="home.php">← Back to Home</a>
        <a class="back-btn" href="SellerM.php">Message Seller</a>
    </div>
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


<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll(".slide");

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? "block" : "none";
        });
    }

    function moveSlide(direction) {
        currentSlide += direction;
        if (currentSlide >= slides.length) currentSlide = 0;
        if (currentSlide < 0) currentSlide = slides.length - 1;
        showSlide(currentSlide);
    }

    // Show first image when page loads
    showSlide(currentSlide);
</script>
</body>
</html>
