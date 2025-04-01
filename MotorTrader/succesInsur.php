<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Success</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #1D4F91; /* Dark Blue */
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }
    </style>
</head>
<body>

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
    <fieldset>
    <h2>Car insurance Listed Successfully!</h2>
    <p>you have got your insurance Successfully</p>
    <button type="submit"><a style="color: white;" href="home.php">Go to Homepage</a></button>

    </fieldset>

    
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

</body>


</html>
