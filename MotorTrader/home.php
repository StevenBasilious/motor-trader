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
}

// Fetch all cars from the database
$conn = getConnection();
$query = "SELECT * FROM cars ORDER BY created_at DESC";
$result = $conn->query($query);

// Search functionality
function getAllCars($search = '') {
    $conn = getConnection();
    $query = "SELECT * FROM cars WHERE make LIKE :make";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':make', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$search = isset($_POST["search"]) ? trim($_POST["search"]) : '';
$cars = $search ? getAllCars($search) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        
.search-bar{
    width: 100%;
    margin: 0 20px 20px;
}

form{
    background-color: #fff;
    width: 600px;
    height: 55px;
    display: flex;
    border: 1px solid #1D4F91;
}

form input{
    flex: 1;
    border: none;
    outline: none;
    color: #1D4F91;
}

form button{
    background-color: #1D4F91;
    padding: 10px 50px;
    border: none;
    outline: none;
    color: #fff;
    letter-spacing: 1px;
    cursor: pointer;
}

form button:hover{
    background-color:rgb(18, 60, 116);
}

form .fa{
    align-self: center;
    padding: 10px 20px;
    color: #1D4F91;
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

    <div class="search-bar">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <i class="fa fa-search"></i>
            <input type="text" id="search" name="search" placeholder="Search here...">
            <button type="submit" class="submit">Search</button>
        </form>
    </div>

    <div class="car-grid">
        <?php if (!empty($cars)): ?>
            <?php foreach ($cars as $car): ?>
                <div class="car-item">
                    <img src="Images/<?= htmlspecialchars($car['image']); ?>" alt="<?= htmlspecialchars($car['make']); ?>" width="300">
                    <h2><?= htmlspecialchars($car['make']) . " " . htmlspecialchars($car['model']); ?></h2>
                    <p><strong>Year:</strong> <?= htmlspecialchars($car['year']); ?></p>
                    <p><strong>Mileage:</strong> <?= number_format($car['mileage']); ?> km</p>
                    <p><strong>Price:</strong> $<?= number_format($car['price'], 2); ?></p>
                    <a href="car.php?id=<?= $car['id']; ?>" class="details-btn">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No cars found.</p>
        <?php endif; ?>
    </div>

    <div class="car-listings">
        <?php while ($car = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="car-card">
                <a href="car.php?id=<?= $car['id']; ?>">
                    <img src="Images/<?= htmlspecialchars($car['image']); ?>" alt="<?= htmlspecialchars($car['make']); ?>" width="300">
                </a>
                <h2><?= htmlspecialchars($car['make']) . " " . htmlspecialchars($car['model']); ?></h2>
                <p><strong>Year:</strong> <?= htmlspecialchars($car['year']); ?></p>
                <p><strong>Mileage:</strong> <?= number_format($car['mileage']); ?> km</p>
                <p><strong>Price:</strong> $<?= number_format($car['price'], 2); ?></p>
                <a href="car.php?id=<?= $car['id']; ?>" class="details-btn">View Details</a>
            </div>
        <?php endwhile; ?>
    </div>
 </div>

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
