<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christmas decoration</title>
    <style>
          body{
            margin: 0; 
            padding: 0;
           
            
        }
        header{
            display: flex;
            justify-content: space-between;
            
        }
        header li{
          padding: 15px;
        margin-left: 15px;
        list-style-type: none;

   }
        header ul  {
        display: flex;
        justify-content: flex-end;
        font-size: 20px;

  }
section{
  padding:5% 10%;

}

.main-home{
  width:wrap;
  height: 100px;
  text-align: center;
  background-image: url(FrontImg.html/shopheader.png);
  background-position: center;
  background-size: cover;
  display:grid;
  align-items:picture-in-picture;
  
}

.main-text h1{
  color: beige;
  font-size:200 px;
  text-transform: capitalize;
  font-weight: 600;
  
}
.products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .product h4 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .product p {
            margin-bottom: 10px;
            color: #777;
        }

        .product button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .product button:hover {
            background-color: #45a049;
        }
 

/* add to cart */ 

.add-to-cart {
  background-color: red;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}

body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer-content p {
            margin: 0;
            flex: 1;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
            display: flex;
            justify-content: space-evenly;
        }

        .footer-links li {
            margin: 0;
        }

        .footer-links li a {
            color: #fff;
            text-decoration: none;
        }

        .footer-links li a:hover {
            text-decoration: underline;
        }



@media only screen and (max-width: 600px) {
  /* Adjustments for screens up to 600px width */

}




   </style>


</head>


<body>
    <header>
        <div class="headeri">
            <img src="FrontImg.html/Logo.png" height="90px" alt="logo" >
        </div>
        <ul>
            <li><a style="text-decoration: none; color: black;" href="FrontPage.php">Home</a></li>
            <li><a style="text-decoration: none; color: black;" href="AboutUs.php">About Us</a></li>
            <li><a style="text-decoration: none; color: black;" href="ContactUs.php">Contact</a></li>
            <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>


        </ul>
    </header>

    <section class="main-home">
      <div class="main-text">
        <h1> New Holiday Collection
          <br>
          Wrap the Presents!
        </h1>
      </div>
    </section>


<!-- Pjesa e Produkteve-->

<section class="'products" id="products">
  <div class="center-text">
    <h2>Our Christmas Related Products</h2>
  </div>

  <section class="products" id="products">
    <div class="product">
        <img src="FrontImg.html/Luxury Christmas tree 3000 LEDs H 180 cm.jpg" alt="">
        <div class="product-text">
            <h4>Luxury Christmas tree</h4>
            <p><s>€ 790,00</s> - <strong>€ 671,50</strong></p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/box of 9 glass balls 2.jpg" alt="">
        <div class="product-text">
            <h4>Box of 9 glass balls</h4>
            <p>€ 39,99</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/box of 9 glass balls.jpg" alt="">
        <div class="product-text">
            <h4>Box of 9 glass balls</h4>
            <p>€ 39,99</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/fluffy cushion with embroidery 45x45cm.jpg" alt="">
        <div class="product-text">
            <h4>Fluffy cushion embroidery</h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/Warm fabric cushion 45x45cm.jpg" alt="">
        <div class="product-text">
            <h4>Warm fabric cushion</h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/Jacquard knitted cushion 40x60cm.jpg" alt="">
        <div class="product-text">
            <h4>Jacquard knitted cushion</h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/jacquard knitted cushion with writing 40x46cm.jpg" alt="">
        <div class="product-text">
            <h4>Jacquard knitted cushion</h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/teddy fabric chushion with embroidery 45x45cm.jpg" alt="">
        <div class="product-text">
            <h4>Teddy embroidery cushion </h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
        <img src="FrontImg.html/christmas tree velvet cushion.jpg" alt="">
        <div class="product-text">
            <h4>Christmas tree cushion</h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/Embroidered sherpa fabric cushion 45x45cm.jpg" alt="">
        <div class="product-text">
            <h4>Embroide sherpa cushion</h4>
            <p>€ 34,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/candle in a star-shaped container.jpg" alt="">
        <div class="product-text">
            <h4>Star-shaped Candle</h4>
            <p>€ 16,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/muffin candle handcrafted.jpg" alt="">
        <div class="product-text">
            <h4>Muffin candle handcrafted</h4>
            <p>€ 19,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/candle in star-shaped glass container.jpg" alt="">
        <div class="product-text">
          <h4>Star-shaped Candle</h4>
          <p>€ 16,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/decorated candle.jpg" alt="">
        <div class="product-text">
        <h4>Decorated candle</h4>
        <p>€ 12,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/christmas tree candle.jpg" alt="">
        <div class="product-text">
        <h4>christmas tree candle </h4>
        <p>€ 20,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/mouth blown glass sphere hand colored by european artisans.jpg" alt="">
        <div class="product-text">
            <h4>Mouth blown glass sphere</h4>
            <p>€ 28,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/decorative velvet bow.jpg" alt="">
        <div class="product-text">
        <h4>Decorative velvet bow</h4>
        <p>€ 10,90</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/decorative wreath with berries and pine cones.jpg" alt="">
        <div class="product-text">
          <h4>Decorative wreath </h4>
          <p>€ 16,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/decorative wreath with berries.jpg" alt="">
        <div class="product-text">
        <h4>Decorative wreath </h4>
        <p>€ 20,00</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product">
    <img src="FrontImg.html/christmas embroidery cotton tablecloth.jpg" alt="">
        <div class="product-text">
        <h4>Christmas cotton tablecloth</h4>
        <p>€ 49,90</p>
        </div>
        <button class="add-to-cart">Add to Cart</button>
    </div>




</section>
</section>

<footer>
  <div class="footer-content">
      <p>&copy; 2024 Your Company Name. All rights reserved.</p>
      <ul class="footer-links">
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Contact Us</a></li>
      </ul>
  </div>
</footer>




    
</body>
</html>