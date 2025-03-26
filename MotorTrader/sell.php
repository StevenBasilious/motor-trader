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
    <title>Sell Your Car - Motor Trader</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <span>Hello, <?= htmlspecialchars($_SESSION['user_name']); ?></span>
                    <a href="logout.php">Logout</a>
                    <?php else: ?>
                    <a href="account.html">Account</a>
                <?php endif; ?>
            </div>
        </nav>
     </header>

     <main>
        <section id="sell-car">
        <h2 style="text-align: center; color: #1D4F91;">Sell Your Car</h2>

            <form id="sellForm" action="process_sell.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Find Your Car</legend>
                    <label for="make">Make:</label>
                    <input type="text" id="make" name="make" required>
                    <label for="model">Model:</label>
                    <input type="text" id="model" name="model" required>
                    
                    <label for="year">Year:</label>
                    <input type="number" id="year" name="year" required min="1900" max="2025">
                    <label for="registration">Registration:</label>
                    <input type="text" id="registration" name="registration" required>
                    <label for="mileage">Mileage:</label>
                    <input type="number" id="mileage" name="mileage" required>
                    </fieldset>
                    <fieldset>
                    <legend>Upload Photos</legend>
                    <input type="file" id="carPhotos" name="carPhotos[]" accept="image/*" multiple required>
                    </fieldset>
                    <fieldset>
                    <legend>Car Description</legend>
                    <textarea id="carDescription" name="carDescription" rows="4" placeholder="Describe your car" required></textarea>
                </fieldset>
                <fieldset>
        
                    <legend>Car Details</legend>
                    <label for="price">Price (£):</label>
                    <input type="number" id="price" name="price" step="0.01" required>
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
