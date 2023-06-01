// Check if the user is logged in or registered
var isLoggedIn = false; // Replace with your logic to check if the user is logged in
var isRegistered = false; // Replace with your logic to check if the user is registered

// Get the menu item elements
var registerLink = document.getElementById("register-link");
var loginLink = document.getElementById("login-link");
var logoutLink = document.getElementById("logout-link");

// Hide or show the menu items based on user status
if (isLoggedIn) {
  registerLink.style.display = "none";
  loginLink.style.display = "none";
  logoutLink.style.display = "block";
} else if (isRegistered) {
  registerLink.style.display = "none";
  loginLink.style.display = "block";
  logoutLink.style.display = "none";
} else {
  registerLink.style.display = "block";
  loginLink.style.display = "block";
  logoutLink.style.display = "none";
}

// Retrieve the success query parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const success = urlParams.get('success');

// Check if the success parameter is present and has the value '1'
if (success === '1') {
  // Display the success message dynamically on the page
  const successMessage = document.createElement('p');
  successMessage.textContent = 'Form submitted successfully!';
  successMessage.style.color = 'green';

  // Append the success message to a specific element on the page
  const successContainer = document.getElementById('success-container');
  successContainer.appendChild(successMessage);
}

window.addEventListener('DOMContentLoaded', (event) => {
  document.getElementById('registration-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    
    // Perform registration logic here...
    
    // Redirect to login page
    window.location.href = 'login.html';
  });
});
