<?php
session_start();

?>

<!DOCTYPE html>
<html lang = "en">
<head>
<title></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="quote.css">
<link rel="stylesheet" href="stylee.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>
        /* Form Container */
#sell-car {
  background-color: #ffffff;
  padding: 2em;
  border-radius: 4.2px;
  box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
  max-width: 800px;
  margin: 0 auto;
}


fieldset {
  margin-bottom: 1.5em;
  padding: 1em;
  border: 1px solid #ddd;
  border-radius: 3px;
}

legend {
  font-size: 1.2em;
  font-weight: bold;
  color: #1D4F91; /* Dark Blue */
}

/* Form Fields */
label {
  display: block;
  margin-top: 10px;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
input[type="tel"],
input[type="email"],
input[type="file"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 3px;
  margin-bottom: 10px;
  font-size: 14px;
  background-color: #f9f9f9;
  transition: border-color 0.3s ease-in-out;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="email"]:focus,
input[type="file"]:focus,
textarea:focus {
  border-color: #f0a500;
  outline: none;
}

/* Buttons */
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
  
  button[type="submit"]:hover {
    background-color: #9091ca; /* Light Blue */
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

<main>
    <div class="quote-container">
        <h2>Get Your Car Insurance Quote</h2>
        <form action="quote-output.php" method="post">
           
            <fieldset>
                <legend>Personal Information</legend>
               
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
       
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </fieldset>

            <fieldset>
                <legend>Car Information</legend>
               
                <label for="car_make">Car Make</label>
                <input type="text" id="car_make" name="car_make" required>

                <label for="car_model">Car Model</label>
                <input type="text" id="car_model" name="car_model" required>

                <label for="car_year">Car Year</label>
                <input type="number" id="car_year" name="car_year" required min="1900" max="2025">

                <label for="mileage">Car Mileage</label>
                <input type="number" id="mileage" name="mileage" required min="0">

                <label for="price">Price</label>
                <input type="number" id="price" name="price" required min="0">

                <label for="coverage">Coverage Type</label>
                <select id="coverage" name="coverage_type" required>
                    <option value="comprehensive">Comprehensive</option>
                    <option value="third_party">Third Party</option>
                    <option value="third_party_fire_and_theft">Third Party, Fire & Theft</option>
                </select>
            </fieldset>

            <fieldset>
                <button type="submit">Get Quote</button>
            </fieldset>

        </form>
    </div>
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

</body>
</html>
