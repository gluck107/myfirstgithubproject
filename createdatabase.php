<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS mylove";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Switch to the database
$conn->select_db("mylove");

// Create the register table
$sql = "CREATE TABLE IF NOT EXISTS register (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'register' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Create the get_in_touch table
$sql = "CREATE TABLE IF NOT EXISTS get_in_touch (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    question VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'get_in_touch' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
