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
<link rel="stylesheet" href="stylee.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>
    /* insurance */
body{
    background : white;
}
.insurance-desc {
    position: relative;
    padding: 20px;
}

.insurance-info {
    margin: 10px 100px;
    padding: 20px;
}

.insurance-desc h1 {
    padding: 0;
    font-size: 26px;
    font-weight: 600;
}

.insurance-type {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    min-height: 200px;
}

.insurance-types h1{
    padding: 10px 120px;
    font-size: 26px;
    font-weight: 600;
}

.insurance-col {
    width: 23%;
    background-color: #3c3e9b;
    margin: 20px;
    text-align: center;
    padding: 20px;
    color: #fff;
    border-radius: 8px;
    transition: background-color 0.5s ease;
}

.insurance-col:hover {
    background-color: #5f60b6;
}

.insurance-col h2 {
    font-size: 20px;
    font-weight: 500;
}

.insurance-col p {
    padding: 10px;
    font-size: 14px;
}

.insurance-col .find-more {
    background-color: #ebcc34;
    padding: 7px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    font-size: 16px;
    color: #3c3e9b;
    transition: background-color 0.2s ease;
}

.insurance-col .find-more:hover {
    background-color: #fff;
}

.insurance-quote {
    text-align: center;
    height: 100px;
}

.insurance-quote h2 {
    font-size: 25px;
    font-weight: 700;
    padding: 5px;
    margin: 10px;
}

.insurance-quote a {
    text-decoration: none;
    background-color: #ebcc34;
    color: #3c3e9b;
    border-radius: 5px;
    padding: 10px;
    font-size: 18px;
}

.insurance-quote a:hover {
    background-color: #ffffff;
    border: 1px solid #3c3e9b;
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
                <span style="color: white;">Hello, <?= htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="logout.php">Logout</a>
                <?php else: ?>
                <a href="account.html">Account</a>
            <?php endif; ?>
        </div>
    </nav>
    
    <div id="wrapper">
<main>
    <div class="insurance-desc">
        <!-- <img class="car-background-1" src="Images/car-background-4.jpg" alt="background image"> -->
        <div class="insurance-info">
            <h1>What is Car insurance?</h1>
            <p>Car insurance is a legal requirement, and a type of coverage that helps protect you financially if you're in an accident or your car is damaged or stolen. The type of insurance and costs all depend on the kind of car you own, your history of driving and budget, with other factors take into consideration.</p>
        </div>
        <div class="insurance-info">
            <h1>Why is car insurance required?</h1>
            <p>All drivers are required, by law, to insure their vehicle. As a driver you are responsible to understand that having insurance for your vehicle is manditory. Insurance can reduce the financial burden in case of an incident by covering medical bills, legal fees and repair costs.</p>
        </div>
    </div>

    <div class="insurance-types">
    <h1>Types of insurance:</h1>
    <div class="insurance-type">
        <div class="insurance-col">
            <ul><h2>Third Party</h2></ul>
            <p>Minimum legal required insurance level of coverage for drivers in the UK. Covers injury to others, and damages to third-party property. </p>
            <a href="https://www.gocompare.com/car-insurance/third-party-only-car-insurance/" class="find-more">Find Out More</a>
        </div>
        <div class="insurance-col">
            <ul><h2>Third Party, fire and theft</h2></ul>
            <p>Third party insurance coverage, also includes theft of your vehicle, and damages caused by theft and fire.</p>
            <a href="https://www.gocompare.com/car-insurance/third-party-fire-and-theft/" class="find-more">Find Out More</a>
        </div>
        <div class="insurance-col">
            <ul><h2>Comprehensive</h2></ul>
            <p>Wide-ranging coverage that includes third-party coverage, fire and theft. In addition it covers medical expenses and damage to your vehicle.</p>
            <a href="https://www.gocompare.com/car-insurance/comprehensive-car-insurance/" class="find-more">Find Out More</a>
        </div>
    </div>
    </div>

    <div class="insurance-quote">
        <h2>Get Quote</h2>
        <a href="quote.php">Search</a>
    </div>
   
</main>
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
</div> 

</body>
</html>