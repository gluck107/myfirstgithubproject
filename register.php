<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if form fields are set and not empty
  if (isset($_POST['full-name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {
    // Retrieve the form input values
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// ...




    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mylove';

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Perform further processing or database operations with the form data

    // Example: Inserting the form data into the database
$sql = "INSERT INTO register (full_name, email, phone, password) VALUES ('$fullName', '$email', '$phone', '$hashedPassword')";



    if ($conn->query($sql) === TRUE) {
      // Registration successful
      echo "Registration successful!";
      
      // Redirect to the login page
      header("Location: login.html");
      exit();
    } else {
      // Error in registration
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
    // End the script execution
    exit();
  } else {
    // Invalid form data
    echo "Invalid form data.";
  }
}
?>
