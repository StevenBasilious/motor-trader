<?php
function getConnection() {
    try {
        $conn = new PDO('mysql:host=localhost;charset=utf8;dbname=motorTraderdb', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
        echo "Oh no, there was a problem: " . $exception->getMessage();
    }

    return $conn;
}

session_start();

$name = ($_POST['name']);
$email = ($_POST['email']);
$make = ($_POST['car_make']);
$model = ($_POST['car_model']);
$year = ($_POST['car_year']);
$mileage = ($_POST['mileage']);
$price = ($_POST['price']);
$coverage_type = ($_POST['coverage_type']);

$conn = getConnection();

$query = "SELECT provider, price, duration_months FROM insurances WHERE insurance_type = :coverage_type";
$stmt = $conn->prepare($query);
$stmt->bindParam(':coverage_type', $coverage_type);
$stmt->execute();
$insurances = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insurance Quote Results</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body   {
            background : white;
        }
        /* insurance results */
.insure_table {
    width: 100%;
    border-collapse: collapse;
}

.insure_th {
    background-color: #3c3e9b;
    color: #ffffff;
    padding: 15px;
    text-align: left;
    font-size: 16px;
}

.insure_td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #dddddd;
    font-size: 14px;
}

.insure_tr:hover {
    background-color: #e4e4e4;
}

.insure_btn {
    display: inline-block;
    padding: 8px;
    background-color: #ebcc34;
    color: #3c3e9b;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    border: 1px solid #ebcc34;
}

.insure_btn:hover {
    background-color: #ffffff;
    border: 1px solid #3c3e9b;
}

.insure_type h2{
    text-align: center;
    font-size: 22px;
    padding: 10px;
}

/* insure details */

.insure_details {
    width: 80%;
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    border: 3px solid #dddddd;
    border-radius: 10px;
}

.insure_details h1 {
    font-size: 24px;
    text-align: center;
    margin: 10px;
}

.insure_details p {
    font-size: 16px;
    margin: 10px;
}

.insure_details p:not(:last-child) {
    border-bottom: 1px solid #dddddd;
    padding-bottom: 10px;
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
    <div class="insure_details">
    <h1><?php echo $name ?>, Here are Your Details:</h1>
    <p>Email Address: <?php echo $email; ?></p>
    <p>Car Make: <?php echo $make; ?></p>
    <p>Car Model: <?php echo $model; ?></p>
    <p>Car Year: <?php echo $year; ?></p>
    <p>Car Mileage: <?php echo $mileage; ?></p>
    <p>Price: £<?php echo $price; ?></p>
    <p>Coverage Type: <?php echo $coverage_type; ?></p>
    </div>

    <div class="insure_type">
    <h2>Insurance Plans Available for your Coverage</h2>
    <?php
    if ($insurances){
        echo "<table class='insure_table'>
                <tr class='insure_tr'>
                    <th class='insure_th'>Provider</th>
                    <th class='insure_th'>Price</th>
                    <th class='insure_th'>Duration (Months)</th>
                    <th class='insure_th'></th>
                </tr>";

        foreach ($insurances as $plan) {
            echo "<tr class='insure_tr'>
                    <td class='insure_td'>" . ($plan['provider']) . "</td>
                    <td class='insure_td'>£" . number_format($plan['price']) . "</td>
                    <td class='insure_td'>" . number_format($plan['duration_months']) . "</td>
                    <td class='insure_td'><a class='insure_btn' href='succesInsur.php'>Pick Insurance</button></a>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No insurance plans available for the selected coverage type.</p>";
    }
    ?>
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