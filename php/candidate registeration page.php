<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include 'C:\xampp\htdocs\skill navigator\php\db_connection.php';

$sql = "SELECT * FROM batches";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Navigator - Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <style type="text/css">/* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #0073e6;
    color: white;
    padding: 15px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
 -+   padding: 0 20px;
}

nav .logo a {
    font-size: 1.5rem;
    color: white;
    text-decoration: none;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
}

nav ul li a:hover {
    text-decoration: underline;
}

.auth-buttons {
    display: flex;
    gap: 10px;
}

.auth-buttons .login-btn, .auth-buttons .signup-btn {
    background-color: #005bb5;
    color: white    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
}

.auth-buttons .signup-btn {
    background-color: #ff5722;
}

.auth-buttons a:hover {
    opacity: 0.9;
}

/* Register Section */
.register-section {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.register-section h1 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}
*
.form-group input[type="text"], 
.form-group input[type="email"], 
.form-group input[type="password"], 
.form-group input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.submit-btn {
    width: 100%;
    padding: 15px;
    background-color: #0073e6;
    color: white;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

.submit-btn:hover {
    background-color: #005bb5;
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: 50px;
}

footer p {
    margin: 0;
}</style>
  <header>
    <nav>
      <div class="logo">
        <a href="index.html">Skill Navigator</a>
      </div>
      <ul>
        <li><a href="Homepage.html">Home</a></li>
        <li><a href="explore.html">Explore</a></li>
        <li><a href="candidate dashboard.html">Dashboard</a></li>
        <li><a href="profile.html">Profile</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="register-section">
      <h1>Register</h1>
      <form id="register-form">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="resume">Resume:</label>
          <input type="file" id="resume" name="resume" required>
        </div>
        <button type="submit" class="submit-btn"><a href="profile.html">Register</a></button>
        <p>Already existing User?<p>
        <button type="submit" class="submit-btn"><a href="candidate dashboard.html">Login</a></button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Skill Navigator. All rights reserved.</p>
  </footer>

  <script src="script.js">
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('register-form');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const resumeInput = document.getElementById('resume');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Simple validation
        if (nameInput.value.trim() === "") {
            alert("Please enter your name.");
            nameInput.focus();
            return;
        }

        if (emailInput.value.trim() === "" || !validateEmail(emailInput.value)) {
            alert("Please enter a valid email address.");
            emailInput.focus();
            return;
        }

        if (passwordInput.value.trim() === "") {
            alert("Please enter a password.");
            passwordInput.focus();
            return;
        }

        if (resumeInput.files.length === 0) {
            alert("Please upload your resume.");
            resumeInput.focus();
            return;
        }

        // If all validation passes
        alert("Registration successful!");
        form.reset(); // Reset the form
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email.toLowerCase());
    }
});</script>
</body>
</html>
<?php
$conn->close();
?>