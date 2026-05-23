<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GlamDiva - Profile</title>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Google Fonts for Elegant Header and Buttons -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
  <script type="text/javascript" src="darkmode.js" defer>
  let darkmode = localStorage.getItem('darkmode')
const themeSwitch = document.getElementById('theme-switch')

const enableDarkmode = () => {
    document.body.classList.add('darkmode')
    localStorage.setItem('darkmode', 'active')
}

const disableDarkmode = () => {
    document.body.classList.remove('darkmode')
    localStorage.setItem('darkmode', 'null')
}

if(darkmode === "active") enableDarkmode()

themeSwitch.addEventListener("click", () => {
    darkmode = localStorage.getItem('darkmode')
    darkmode !== "active" ? enableDarkmode() : disableDarkmode()
})</script>
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
      --primary-color: rgb(0, 0, 0);
    }

    /* === General Styles === */
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

    /* === Header === */
    header {
      background-color: var(--base-color);
      color: rgb(114, 114, 114);
      padding: 30px 15px;
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

    .nav:hover {
      color: whitesmoke;
    }
         /* === Slideshow === */
    .slideshow-container {
      width: 100%;
      max-width: 1600px;
      margin: 0 auto;
      height: 300px;
      overflow: hidden;
    }

    .slide {
      width: 400%;
      height: 500px;
      display: flex;
      animation: slide 16s infinite;
    }

    .slide img {
      width: 100%;
      height: 500px;
      object-fit: cover;
    }

    @keyframes slide {
      0%, 20% { transform: translateX(0); }
      25%, 45% { transform: translateX(-25%); }
      50%, 70% { transform: translateX(-50%); }
      75%, 100% { transform: translateX(-75%); }
    }
    /* === Footer === */
    footer {
      background-color: var(--base-color);
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }

    /* === Theme Switch === */
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

    #theme-switch svg {
      fill: var(--primary-color);
    }

    #theme-switch svg:last-child {
      display: none;
    }

    .darkmode #theme-switch svg:first-child {
      display: none;
    }

    .darkmode #theme-switch svg:last-child {
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
    .darkmode nav a {
       color: #929091;
    }
.info {
    background: #1c1c1c;
    color: #f2f2f2;
    padding: 30px;
    border-radius: 16px;
    max-width: 500px;
    margin: 40px auto;
    box-shadow: 0 0 15px rgba(255, 105, 180, 0.3);
    text-align: center;
    font-family: 'Segoe UI', sans-serif;
}

.info h1 {
    font-size: 2em;
    margin-bottom: 15px;
    color: #ff69b4; /* Glam pink */
}

.info p {
    margin: 10px 0;
    font-size: 1.1em;
}

.logout-btn {
    display: inline-block;
    background: #ff69b4;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 8px;
    transition: background 0.3s ease;
    font-weight: bold;
}

.logout-btn:hover {
    background: #ff1493;
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
            </nav>
            <button id="theme-switch">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/></svg>

            </button>
          </header>
          <div class="slideshow-container">
    <div class="slide">
      <img src="jj1.png" alt="Slide 1">
      <img src="jj.png" alt="Slide 2">
      <img src="jj1.png" alt="Slide 3">
      <img src="jj.png" alt="Slide 4">
    </div>
  </div>
  <div class="info">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
    <p><a href="logout.php" class="logout-btn">Logout</a></p>
</div>
    <footer>
    &copy; 2025 GlamDiva Store | All rights reserved.
  </footer>
</body>
</html>