
<?php
//http://localhost/CARS/index.php http://localhost/CARS/motor-trader/MotorTrader/index.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("database.php");
?>

<?php 
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <p>hello</p>

    <?php
    // OPTIONAL: Just to test connection inside HTML
    if ($conn) {
        echo "<p>Connected to database successfully!</p>";
    }
    ?>
</body>
</html>
