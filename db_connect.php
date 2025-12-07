<?php

$servername = "127.0.0.1";
$username = "root";
$dbname = "booking";
$port = 3307; 


try {
    $conn = new mysqli($servername, $username, "", $dbname, $port);
} catch (mysqli_sql_exception $e) {
    
    try {
        $conn = new mysqli($servername, $username, "root", $dbname, $port);
    } catch (mysqli_sql_exception $e2) {
        // If both fail, stop and show error
        die("<h3>Database Connection Failed</h3>
             <p>Could not connect to database '<b>$dbname</b>' on port <b>$port</b>.</p>
             <p><b>Error:</b> " . $e2->getMessage() . "</p>");
    }
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Select the database
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}


$table_sql = "CREATE TABLE IF NOT EXISTS bookings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    car VARCHAR(30) NOT NULL,
    booking_date DATE NOT NULL,
    return_date DATE,
    pickup_location VARCHAR(100) NOT NULL,
    purpose TEXT,
    payment_method VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    
} else {
    die("Error creating table: " . $conn->error);
}
?>
