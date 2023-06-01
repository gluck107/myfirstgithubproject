<!DOCTYPE html>
<html>
<head>
  <title>Money Language - The Ebook</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Custom styles for the menu bar */
    .navbar-brand {
      margin-right: auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="PopUp.php"><i class="fas fa-book-open"></i>Money Language - The Ebook</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="book.html">About The Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#reviews" data-bs-toggle="modal" data-bs-target="#myModal5">Reviews</a>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary bg-transparent text-black border-0" data-bs-toggle="modal" data-bs-target="#myModal2">
              Get in Touch
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tabs">BS-5 Tabs</a>
          </li>
          <li class="nav-item" id="register-link">
            <a class="nav-link" href="register.html">Register</a>
          </li>
          <li class="nav-item" id="login-link">
            <a class="nav-link" href="login.html">Login</a>
          </li>
          <li class="nav-item" id="logout-link">
            <a class="nav-link" href="#logout">Logout</a>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Buy Now
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
  <style>
  .success-message {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  background-color: rgba(0, 0, 1, 0.8);
  color: white;
  font-size: 24px;
  text-align: center;
}

@keyframes blink {
  0% {
    color: green;
  }
  50% {
    color: white;
  }
  100% {
    color: green;
  }
}

.blink-animation {
  animation: blink 1s infinite;
}



</style>




<div class="book-container">
  <div class="book book-left">
    <img src="book6.jpg" alt="Book 1">
    
  </div>
  <div class="book book-middle">
    <img src="book4.jpg" alt="Book 2">
  </div>
  <div class="book book-right">
    <img src="book3.jpg" alt="Book 3">
  </div>
</div>

<br><br>





<div class="center-container">
  <li class="nav-item">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
      Explore More Books on Web development 
    </button>
  </li>
</div>



<style>
.center-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 10vh; /* Adjust the height as per your preference */
}

</style>







<style>
.book-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.book {
  flex: 1;
  margin: 10px;
  animation: rotate 9s linear infinite;
  transform-style: preserve-3d;
}

.book img {
  max-width: 100px; /* Adjust the size as per your requirement */
  height: auto;
}

.book-left {
  transform-origin: right center;
}

.book-middle {
  transform-origin: center center;
}

.book-right {
  transform-origin: left center;
}

@keyframes rotate {
  0% {
    transform: rotateY(0);
  }
  100% {
    transform: rotateY(360deg);
  }
}



</style>













<?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['question']) && isset($_POST['message'])) {
      // Retrieve the form input values
      $email = $_POST['email'];
      $name = $_POST['name'];
      $question = $_POST['question'];
      $message = $_POST['message'];

      // Database connection
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'mylove';

      $conn = new mysqli($host, $username, $password, $database);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Prepare and bind the SQL statement
      $stmt = $conn->prepare("INSERT INTO get_in_touch (email, name, question, message) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $email, $name, $question, $message);

      if ($stmt->execute()) {
        // Insertion successful
        // Display the success message
        echo '<div class="success-message"><span class="blink-animation">Form submitted successfully!</span></div>';
      } else {
        // Error in execution
        echo "Error: " . $stmt->error;
      }
      
      




      // Close the statement and connection
      $stmt->close();
      $conn->close();
    } else {
      // Invalid form data
      echo "Invalid form data.";
    }
  }
?>
