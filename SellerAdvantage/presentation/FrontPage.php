<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/main.css?v=1.0">


    </head>
<body>
    <header>
        <div class="headeri">
            <img src="../FrontImg.html/Logo.png" height="90px" alt="logo">
        </div>
        <ul>
            <li><a href="FrontPage.php">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="LogIn.php">Log In</a></li>
            <li><a href="LogOut.php">Log Out</a></li>
        </ul>
    </header>

    <div class="image-container">
        <img src="../FrontImg.html/Foto1.jpg" alt="Foto1">
        <div class="overlay-text">
            <p>Nature Inspired Design</p>
            <button><a href="#nav">Shop Now</a></button>
        </div>
    </div>

    <div class="info">
        <h2>Shop By Category</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
            Alias at, aliquid fugit accusantium dolore recusandae <br>
            aliquam harum voluptatem blanditiis. Fugiat laborum error</p>
    </div>

    <div class="containers">
        <div>
            <img src="../FrontImg.html/furniture2.png" alt="bedroom">
            <p>Bedroom</p>
        </div>
        <div>
            <img src="../FrontImg.html/furniture3.png" alt="bathroom">
            <p>Bathroom</p>
        </div>
        <div>
            <img src="../FrontImg.html/furniture4.png" alt="kitchen">
            <p>Kitchen</p>
        </div>
        <div>
            <img src="../FrontImg.html/furniture5.png" alt="garden">
            <p>Garden</p>
        </div>
    </div>

    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="../FrontImg.html/slider-img.webp" alt="Newest Furniture">
            <div class="text">Newest Furniture</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="../FrontImg.html/slider-img2.webp" alt="Newest Furniture">
            <div class="text">Newest Furniture</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="../FrontImg.html/slider-img3.jpg" alt="Newest Furniture">
            <div class="text">Newest Furniture</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    <div id="nav">
        <div class="fotografite">
            <div class="container">
                <img class="image" src="../FrontImg.html/fotografia1.webp" alt="Rustic Furniture">
                <div class="middle">
                    <p class="textt">Rustic Furniture</p>
                </div>
            </div>
            <div class="container">
                <img class="image" src="../FrontImg.html/fotografia2.webp" alt="Japan Style">
                <div class="middle">
                    <p class="textt">Japan Style</p>
                </div>
            </div>
            <div class="container">
                <img class="image" src="../FrontImg.html/fotografia4.jpg" alt="Eclectic Furniture">
                <div class="middle">
                    <p class="textt">Eclectic Furniture</p>
                </div>
            </div>
            <div class="container">
                <img class="image" src="../FrontImg.html/fotografia5.webp" alt="Shabby Chic">
                <div class="middle">
                    <p class="textt">Shabby Chic Furniture</p>
                </div>
            </div>
            <div class="container">
                <img class="image" src="../FrontImg.html/fotografia6.jpg" alt="Minimalistic Design">
                <div class="middle">
                    <p class="textt">Minimalistic Design</p>
                </div>
            </div>
            <div class="container">
                <img class="image" src="../FrontImg.html/fotografia3.png" alt="Coastal Furniture">
                <div class="middle">
                    <p class="textt">Coastal Furniture</p>
                </div>
            </div>
        </div>

        <div class="container3">
            <div class="container3Tekst">
                <h2>Guess What's New On Our Decor Shop</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod cum exercitationem saepe magnam, eum suscipit. Dignissimos.</p>
                <button><a href="Shop.php">Shop Now</a></button>
            </div> 
            <img src="../FrontImg.html/FrontP4.jpg" alt="Front Image">
        </div>

        <footer>
            <div class="f">
                <h2>About Us</h2>
                <h2>Our Links</h2>
            </div>
            <div class="footermain">
                <div class="footerleft">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                        Nobis nihil autem, consequatur dolor maiores, sapiente <br>
                        corrupti nemo repellat ratione fuga neque. Quae dolorum <br>
                        rem eos placeat perspiciatis quas, veritatis delectus! <br>
                    </p>
                </div>
                <div class="footercenter">
                    <p>Advertise</p>
                    <p>Support</p>
                    <p>Our Company</p>
                    <p>Contact</p>
                </div>
                <div class="footerright">
                    <p>Terms of use</p>
                    <p>Privacy Policy</p>
                </div>
            </div>
        </footer>

        <div class="end">
            <div class="footer-content">
                <p>&copy; 2024 Your Company Name. All rights reserved.</p>
                <ul class="footer-links">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

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
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>
</html>