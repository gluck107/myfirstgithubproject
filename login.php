


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if form fields are set and not empty
  if (isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve the form input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $host = 'localhost';
    $username = 'root';
    $dbPassword = '';
    $database = 'mylove';

    $conn = new mysqli($host, $username, $dbPassword, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a matching user is found in the database
    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      $hashedPassword = $row['password'];

      // Verify the entered password against the hashed password
      if (password_verify($password, $hashedPassword)) {
        // Password is correct, user is authenticated
        // Redirect to the appropriate page
        header("Location: PopUp.php");
        exit();
      } else {
        // Incorrect password
        header("Location: login.html?error=invalid");
        exit();
      }
    } else {
      // User does not exist in the database
      header("Location: login.html?error=invalid");
      exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
  } else {
    // Invalid form data
    header("Location: login.html?error=invalid");
    exit();
  }
}
?>
