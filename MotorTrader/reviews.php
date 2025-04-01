<?php
// Start session
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection using PDO
function getConnection() {
    try {
        $conn = new PDO('mysql:host=localhost;dbname=motorTraderDB;charset=utf8', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $exception) {
        die("Oh no, there was a problem: " . $exception->getMessage());
    }
}?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Car Reviews - Motor Trader</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
            <li><a href="sell.php">Sell Car</a></li>
            <li><a href="insurance.php">Car Insurance</a></li>
            <li><a href="Reviews.php">Reviews</a></li>
            </ul>
            
            <div class="login-btn">
            <?php if (isset($_SESSION['user_name'])): ?>
                <span style="color: white;">Hello, <?= htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="logout.php">Logout</a>
                <?php else: ?>
                <a href="account.html">Account</a>
            <?php endif; ?>
        </div>
    </nav>
        </header>

        <main>
            <section class="reviews">
                <h2>Car Reviews</h2>
                <p>Share your experience and read what others think about different car models.</p>

                <div class="review-form">
                    <h3>Leave a Review</h3>
                    <form id="reviewForm">
                        <label for="carModel">Car Model:</label>
                        <input type="text" id="carModel" placeholder="Enter car model..." required>

                        <label for="reviewText">Your Review:</label>
                        <textarea id="reviewText" rows="4" placeholder="Write your review here..." required></textarea>

                        <label for="rating">Star Rating:</label>
                        <div class="star-rating">
                            <i class="fas fa-star" data-value="1"></i>
                            <i class="fas fa-star" data-value="2"></i>
                            <i class="fas fa-star" data-value="3"></i>
                            <i class="fas fa-star" data-value="4"></i>
                            <i class="fas fa-star" data-value="5"></i>
                        </div>

                        <button type="submit"><i class="fas fa-paper-plane"></i> Submit Review</button>
                    </form>
                </div>

                <div class="review-list">
                    <h3>Recent Reviews</h3>
                    <div id="reviewsContainer">
                        <div class="review-card">
                            <h4>BMW X5</h4>
                            <p>"Amazing performance and luxury! Highly recommend."</p>
                            <span>⭐️⭐️⭐️⭐️⭐️</span>
                        </div>
                        <div class="review-card">
                            <h4>Ford Fiesta</h4>
                            <p>"Great fuel efficiency and affordable price!"</p>
                            <span>⭐️⭐️⭐️⭐️</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
         <div class="footer-con">
         <div class="footer-row">
            <div class="footer-col">
                <h2>MotorTrader</h2>
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
                    <p>Copyright&copy; 2025 Motor Trader</p>
                </div>
            </div>
        </div>
      </div>
      </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>
