<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover unique furniture designs inspired by nature.">
    <meta name="keywords" content="furniture, design, home decor, shop">
    <meta name="author" content="Your Company Name">
    <title>Home | Furniture Shop</title>
    <link rel="stylesheet" href="../styles/main.css"> <!-- Shtegu i korrigjuar për CSS -->
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-logo">
            <img src="../FrontImg.html/Logo.png" alt="Logo" height="90"> <!-- Shtegu i korrigjuar -->
        </div>
        <nav>
            <ul>
                <li><a href="FrontPage.php">Home</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="LogOut.php">Log Out</a></li>
                <?php else: ?>
                    <li><a href="LogIn.php">Log In</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="../FrontImg.html/Foto1.jpg" alt="Nature Inspired Design"> <!-- Shtegu i korrigjuar -->
        <div class="hero-overlay">
            <h1>Nature Inspired Design</h1>
            <a href="#categories" class="btn">Shop Now</a>
        </div>
    </div>

    <!-- Shop by Category -->
    <section id="categories">
        <div class="section-header">
            <h2>Shop By Category</h2>
            <p>Explore a wide range of furniture collections for every room in your home.</p>
        </div>
        <div class="categories-grid">
            <div class="category">
                <img src="../FrontImg.html/furniture2.png" alt="Bedroom">
                <p>Bedroom</p>
            </div>
            <div class="category">
                <img src="../FrontImg.html/furniture3.png" alt="Bathroom">
                <p>Bathroom</p>
            </div>
            <div class="category">
                <img src="../FrontImg.html/furniture4.png" alt="Kitchen">
                <p>Kitchen</p>
            </div>
            <div class="category">
                <img src="../FrontImg.html/furniture5.png" alt="Garden">
                <p>Garden</p>
            </div>
        </div>
    </section>

    <!-- Slider Section -->
    <section id="slider">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="../FrontImg.html/slider-img.webp" alt="Newest Furniture">
            <div class="text">Newest Furniture</div>
        </div>
        <div class="mySlides fade">
            <img src="../FrontImg.html/slider-img2.webp" alt="Modern Design">
            <div class="text">Modern Design</div>
        </div>
        <div class="mySlides fade">
            <img src="../FrontImg.html/slider-img3.jpg" alt="Rustic Style">
            <div class="text">Rustic Style</div>
        </div>

        <!-- Navigation Arrows -->
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

    <!-- Dots/Indicators -->
    <div class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</section>


<!-- JavaScript for Slider -->
<script>
    let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

</script>


    <!-- Featured Products -->
    <section id="featured-products">
        <div class="products-grid">
            <div class="product">
                <img src="../FrontImg.html/fotografia1.webp" alt="Rustic Furniture">
                <p>Rustic Furniture</p>
            </div>
            <div class="product">
                <img src="../FrontImg.html/fotografia2.webp" alt="Japan Style">
                <p>Japan Style</p>
            </div>
            <div class="product">
                <img src="../FrontImg.html/fotografia3.png" alt="Coastal Furniture">
                <p>Coastal Furniture</p>
            </div>
            <div class="product">
                <img src="../FrontImg.html/fotografia4.jpg" alt="Eclectic Furniture">
                <p>Eclectic Furniture</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="f">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolorum rem eos placeat perspiciatis quas.</p>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; 2024 Your Company Name. All rights reserved.</p>
    </footer>

    <script src="../scripts/main.js"></script> <!-- JS -->
</body>
</html>
