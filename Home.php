<?php
// Start session if needed for future use
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GlamDiva</title>
  <link href="master.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

  <script type="text/javascript" src="darkmode.js"defer></script>
<!-- //   let darkmode = localStorage.getItem('darkmode')
// const themeSwitch = document.getElementById('theme-switch')

// const enableDarkmode = () => {
//     document.body.classList.add('darkmode')
//     localStorage.setItem('darkmode', 'active')
// }

// const disableDarkmode = () => {
//     document.body.classList.remove('darkmode')
//     localStorage.setItem('darkmode', 'null')
// }

// if(darkmode === "active") enableDarkmode()

// themeSwitch.addEventListener("click", () => {
//     darkmode = localStorage.getItem('darkmode')
//     darkmode !== "active" ? enableDarkmode() : disableDarkmode()
// }) -->

<script defer>
  document.addEventListener("DOMContentLoaded", () => {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    showSlide(currentSlide);
    setInterval(nextSlide, 3000);
  });
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
      color: #727272;
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

    .hero {
      background-color:#ffe6f0;
      height: 300px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
    }

    .hero h1 {
      background-color: rgba(0, 0, 0, 0.4);
      padding: 20px;
      border-radius: 10px;
    }

    .buttons-area {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
      margin: 30px;
    }

    .btn {
      background-color: var(--base-color);
      border: none;
      font-family: 'Playfair Display', serif;
      padding: 15px 25px;
      color: white;
      border-radius: 30px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: var(--accent-color);
      color: white;
    }

    .products {
              display: flex;
              flex-wrap: wrap;
              justify-content: center;
              gap: 20px;
              padding: 30px;
            }
        
            .product-card {
              background-color: white;
              border-radius: 15px;
              box-shadow: 0 4px 8px rgba(0,0,0,0.1);
              width: 220px;
              text-align: center;
              padding: 15px;
              transition: transform 0.3s;
            }
        
            .product-card:hover {
              transform: scale(1.05);
            }
        
            .product-card img {
              width: 100%;
              border-radius: 10px;
            }
    
    /* .slideshow-container {
  width: 80%;
  max-height: 400px;
  position: relative;
  overflow: hidden;
  margin: 0 auto;
  border-radius: 10px;
  /* transform: translate(50%,50%); */
/* } */



    .slideshow-container {
  width: 100%;
  /* max-width: 1000px; */
  height: 500px;
  margin: 0 auto;
  overflow: hidden;
  position: relative;
}

.slide {
  display: none;
  width: 100%;
  height: 100%;
  animation: slide 16s infinite;
}

.slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
@keyframes slide{
      0%, 20% {
        transform: translateX(0);
      }
      25%, 45% {
        transform: translateX(-25%);
      }
      50%, 70% {
        transform: translateX(-50%);
      }
      75%, 100% {
        transform: translateX(-75%);
      }
    }
    .product-card img {
      width: 100%;
      border-radius: 10px;
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
        fill: var(--base-color);
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

            /* #theme-switch svg{
              fill: var(--primary-color);
            }
            #theme-switch svg:last-child{
              display: none;
            } */
            /* .darkmode body {
              background-color: #121212;
              color: var(--text-color);
            } */
            

    
    .darkmode .hero,
    .darkmode .btn {
      color: var(--text-light);
    }
    .darkmode nav a{
      color: #929091; 
    }
    .darkmode .hero h1 {
      background-color: rgb(40, 40, 40);
    }

    .darkmode .hero {
      background-color: #ffc9e3;
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
.darkmode #theme-switch svg{
        fill: var(--primary-color);
            }
    
  </style>
</head>
<body>
  <header>
            <h1>GlamDiva</h1>
            <nav>
              <a href="Home.html">Home</a>
              <a href="NewArrivals.html">New Arrivals</a>
              <a href="Sale.html">Sale</a>
              <a href="login.php">Contact</a>
            </nav>
            <button id="theme-switch">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/></svg>

            </button>
          </header>

          <div class="slideshow-container">
  <div class="slide"><img src="aa1.jpeg" alt="Slide 1"></div>
  <div class="slide"><img src="ggg.png" alt="Slide 2"></div>
  <div class="slide"><img src="to.png" alt="Slide 3"></div>
  <div class="slide"><img src="gg1.jpeg" alt="Slide 4"></div>
</div>

          <section class="buttons-area">
  <a href="shop.html" ><button class="btn"><span>Shop Now</span></button></a>
 <a href="Dresses.html"> <button class="btn" ><span>Dresses</span></button></a>
 <a href="Blouse.html"> <button class="btn"><span>Blouse</span></button></a>
  <a href="SummerOutfits.html"><button class="btn"><span>Summer Outfits</span></button></a>
  <a href="WinterOutfits.html"><button class="btn"><span>Winter Outfits</span></button></a>
  <a href="TrenchCoats.html"><button class="btn"><span>Trench Coats</span></button></a>
  <a href="AccessoriesPack.html"><button class="btn"><span>Accessories Pack</span></button></a>
</section>

          <section class="products">
            <div class="product-card">
              <img src="shop3.jpg" alt="Dress 1">
              <h3>Dress</h3>
              <p>$19.99</p>
              <button class="btn"><span>Add to Cart</span></button>
            </div>
            <div class="product-card">
              <img src="summer1.jpg"  alt="Summer Look">
              <h3>Summer Look</h3>
              <p>$15.99</p>
              <button class="btn"><span>Add to Cart</span></button>
            </div>
            <div class="product-card">
              <img src="makeup1.jpg" alt="T-Shirt">
              <h3>MakeUp</h3>
              <p>$9.99</p>
              <button class="btn"><span>Add to Cart</span></button>
            </div>
            <div class="product-card">
              <img src="jew1.jpg" alt="Accessories">
              <h3>Accessories Pack</h3>
              <p>$5.99</p>
              <button class="btn"><span>Add to Cart</span></button>
            </div>
          </section>

          <footer>
            &copy; 2025 GlamDiva Store | All rights reserved.
          </footer>
</body>
</html>