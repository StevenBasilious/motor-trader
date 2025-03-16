<?php
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
</head>

<body>
<div id="wrapper">

<nav class="navbar">
        <div class="logo">
            <a href="home.php"><img src="Images/logo.png" alt="Motor Trade Logo"></a>
        </div>
        <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="buy.html">Buy Car</a></li>
        <li><a href="sell.html">Sell Car</a></li>
        <li><a href="insurance.html">Car Insurance</a></li>
        <li><a href="mot.html">MOT Services</a></li>
        
        </ul>
        <div class="login-btn">
            <a href="#">Account</a>
        </div>
    </nav>

<main>

<form class="basic-search", action="#">
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

</form>
</main>

<div class="car-listings">
    <?php while($car = mysqli_fetch_assoc($result)): ?>
        <div class="car-card">
            <img src="<?php echo $car['image']; ?>" alt="Car Image" width="300">
            <h2><?php echo htmlspecialchars($car['make']) . " " . htmlspecialchars($car['model']); ?></h2>
            <p>Year: <?php echo htmlspecialchars($car['year']); ?></p>
            <p>Mileage: <?php echo htmlspecialchars($car['mileage']); ?> km</p>
            <p>Price: $<?php echo htmlspecialchars($car['price']); ?></p>
            <a href="car-details.php?id=<?php echo $car['id']; ?>">View Details</a>
        </div>
    <?php endwhile; ?>
</div>

<footer></footer>

</div>    
</body>
</html>