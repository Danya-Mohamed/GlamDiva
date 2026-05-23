<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "glamdiva";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginError = "";
$registerSuccess = "";
$registerError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "login") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $username, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION["user_id"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                header("Location: profile.php");
                exit();
            } else {
                $loginError = "Invalid password.";
            }
        } else {
            $loginError = "User is not found.";
        }

        $stmt->close();
    }

    if (isset($_POST["action"]) && $_POST["action"] == "register") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Check if user already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $registerError = "User already exists.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password);
            if ($stmt->execute()) {
                $_SESSION["user_id"] = $stmt->insert_id;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $registerSuccess = "Registration successful!";
                header("Location: profile.php");
                exit();
            } else {
                $registerError = "Registration failed.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GlamDiva</title>
  <link href="master.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
  <script defer >
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form');
  const emailInput = form.querySelector('input[name="email"]');
  const passwordInput = form.querySelector('input[name="password"]');

  form.addEventListener('submit', function (e) {
    let isValid = true;

    // Reset previous errors
    clearError(emailInput);
    clearError(passwordInput);

    // Email validation
    if (!emailInput.value.trim()) {
      showError(emailInput, 'Email is required');
      isValid = false;
    } else if (!isValidEmail(emailInput.value.trim())) {
      showError(emailInput, 'Enter a valid email');
      isValid = false;
    }

    // Password validation
    if (!passwordInput.value.trim()) {
      showError(passwordInput, 'Password is required');
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault(); // Stop form from submitting
    }
  });

  function showError(input, message) {
    const parent = input.parentElement;
    parent.classList.add('error');
    parent.classList.remove('success');

    let error = parent.querySelector('.error-message');
    if (!error) {
      error = document.createElement('small');
      error.classList.add('error-message');
      parent.appendChild(error);
    }
    error.textContent = message;
  }

  function clearError(input) {
    const parent = input.parentElement;
    parent.classList.remove('error');
    parent.classList.remove('success');

    const error = parent.querySelector('.error-message');
    if (error) error.remove();
  }

  function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
  }
});
document.addEventListener('DOMContentLoaded', () => {
  let darkmode = localStorage.getItem('darkmode');
  const themeSwitch = document.getElementById('theme-switch');

  const enableDarkmode = () => {
    document.body.classList.add('darkmode');
    localStorage.setItem('darkmode', 'active');
  };

  const disableDarkmode = () => {
    document.body.classList.remove('darkmode');
    localStorage.setItem('darkmode', 'null');
  };

  if (darkmode === "active") enableDarkmode();

  if (themeSwitch) {
    themeSwitch.addEventListener("click", () => {
      darkmode = localStorage.getItem('darkmode');
      darkmode !== "active" ? enableDarkmode() : disableDarkmode();
    });
  }
});
  </script>
  <script>
        function toggleForm(formName) {
            document.getElementById('loginForm').style.display = formName === 'login' ? 'block' : 'none';
            document.getElementById('registerForm').style.display = formName === 'register' ? 'block' : 'none';
        }
    </script>
  <style>
    :root {
      --base-color: #ff4da6;
      --accent-color: #ffa0cb;
      --background-light: #ffe6f0;
      --background-dark: #3b0a2b;
      --text-light: #333;
      --text-dark: #f5f5f5;
      --card-bg-light: #ffffff;
      --card-bg-dark: #4a154b;
      --primary-color:rgb(0, 0, 0);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--background-light);
      margin: 0;
      padding: 0;
      color: var(--text-light);
      position: relative;
    }

    /* Background image with low opacity */
    body::before {
      content: "";
      background-image: url("ll9.png");
      /* background-color: #ccccccbf; */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.3;
      z-index: -1;
    }

    header {
      background-color: var(--base-color);
      color: rgb(114, 114, 114);
      padding: 30px;
      text-align: center;
    }

    header h1 {
      font-family: 'Great Vibes', cursive;
      color: #ffffff;
      font-size: 4rem;
      letter-spacing: 1.5px;
      margin-bottom: 10px;
    }

    nav a {
      font-family: 'Playfair Display', serif;
      color: #fcc9e0;
      margin: 0 15px;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s;
    }
        
    .btn {
      background-color: #ff4da6;
      border: none;
      padding: 15px 15px;
      color: white;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s,color 0.3s;
      margin-top: 10px;
      align-items: center;
      width: 100%;
      text-align: center;
    }

    .btn:hover {
      background-color: #faa1cd;
      color: rgb(70, 69, 69);
    }
    /* Container to center everything */
.container {
    width: 600px;
    margin: 10vh auto 0 auto;
    padding: 20px;
    background-color: whitesmoke;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(255, 105, 180, 0.2);
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

/* Common form style */
form {
    display: none; /* Hidden by default, show with JS */
    flex-direction: column;
    align-items: center;
}

/* Show login form by default */
#loginForm {
    display: flex;
}

/* Headings */
form h2 {
    font-size: 30px;
    text-align: center;
    color: #ff4da6;
    margin-bottom: 20px;
}

/* Input fields */
form input {
    width: 90%;
    padding: 10px;
    margin: 8px 0;
    border: 2px solid #f5f5f5;
    border-radius: 5px;
    font-size: 14px;
}

/* Buttons */
form button {
    width: 45%;
    padding: 10px;
    margin: 10px 5px;
    border: none;
    border-radius: 5px;
    background-color: #ff4da6;
    color: white;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #e60073;
}

/* Message styling */
.message {
    color: red;
    margin-bottom: 10px;
    text-align: center;
    font-weight: bold;
}

.success {
    color: green;
    margin-bottom: 10px;
    text-align: center;
    font-weight: bold;
}
    /* #form{
        width: 600px;
        margin: 10vh auto 0 auto;
        padding: 20px;
        background-color: whitesmoke; */
        /* opacity: 70%; */
        /* border-radius: 10px;
        font-size: 12px;
    } */
    /* #form h1{
        font-size: 30px;
        text-align: center;
        padding-bottom: 30px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #ff4da6;
    } */
    /* .input-container{
        display: flex;
        flex-direction: column;
        margin: 0;
        display: flex;    
        justify-content: center;    
        align-items: center;  
    }
    .input-container input{
        border: 2px solid #f5f5f5;
        border-radius:4px ;
        display: block;
        font-size: 12px;
        padding: 10px;
        width: 100%;
        height: 100%;      
    } */
    .input-container input:focus{
        outline: 0;
    }
    .input-container.success input{
        border-color: #09c372;
    }
        .input-container.error input{
        border-color: #ff3860;
    }
    footer {
      background-color: var(--base-color);
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
    #theme-switch {
      height: 50px;
       width: 50px;
       padding: 0;       
       border-radius: 50%;      
       background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 20px;
        right: 20px;   
        cursor: pointer;    
    }

     #theme-switch svg{
        fill: var(--primary-color);
            }
      #theme-switch svg:last-child{
        display: none;      
            }      
            /* .darkmode body {
              background-color: #121212;
              color: var(--text-color);
            } */
            .darkmode #theme-switch svg:first-child{
              display: none;
            }
            .darkmode #theme-switch svg:last-child{
              display: block;
            }
          

    .darkmode {
      --base-color: #2d0b1c;
      --accent-color: #b65179;
      --background-light: #2b1020;
      --text-light: #f5f5f5;
      --card-bg-light: #3b1b2a;
    }

    .darkmode body {
      background-color: #ffc9e3;
      color: var(--text-light);
    }

    .darkmode header,
    .darkmode footer {
      background-color: var(--base-color);
      color: var(--text-light);
    }

  .darkmode nav a{
      color: #929091; 
    }
    .darkmode .hero,
    .darkmode .btn {
      color: var(--text-light);
    }

    .darkmode .btn {
      background-color: var(--accent-color);
    }

    .darkmode .btn:hover {
      background-color: #db729a;
    }

    .darkmode .product-card {
      background-color: var(--card-bg-light);
      color: var(--text-light);
    }
    .darkmode .container h1{
      color:#4a154b;
    }
    .darkmode #form{
       color:#333;
        width: 600px;
        margin: 10vh auto 0 auto;
        padding: 20px;
        background-color: rgb(228, 226, 226);
        /* opacity: 70%; */
        border-radius: 10px;
        font-size: 12px;
    }
    .darkmode #form h1{
        font-size: 30px;
        text-align: center;
        padding-bottom: 30px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #4a154b;
    }
    #registerForm {
            display: none;
        }
    </style>
  </head>
<body>
  <header>
    <h1>GlamDiva</h1>
    <nav>
      <a href="Home.php">Home</a>
      <a href="NewArrivals.html">New Arrivals</a>
      <a href="Sale.html">Sale</a>
      <a href="login.php">Contact</a>
    </nav>
    <button id="theme-switch">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/></svg>
    </button>        
  </header>
<div class="container">
  <form id="loginForm" method="POST" action="login.php">
    <h2>Login</h2>
    <?php if (!empty($loginError)) echo "<div class='message'>$loginError</div>"; ?>
    <input type="hidden" name="action" value="login">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
    <button type="button" onclick="toggleForm('register')">Register</button>
</form>

<!-- Register Form -->
<form id="registerForm" method="POST" action="login.php">
    <h2>Register</h2>
    <?php
        if (!empty($registerError)) echo "<div class='message'>$registerError</div>";
        if (!empty($registerSuccess)) echo "<div class='success'>$registerSuccess</div>";
    ?>
    <input type="hidden" name="action" value="register">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
    <button type="button" onclick="toggleForm('login')">Back to Login</button>
</form>
</div>
 <footer>
            &copy; 2025 GlamDiva Store | All rights reserved.
          </footer>
</body>

</html>