<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Christmas Decoration</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        header .headeri img {
            height: 50px;
        }

        header ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        header li {
            margin: 0 15px;
        }

        header a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        header a:hover {
            color: #007BFF;
        }

        .main-home {
            background-image: url('FrontImg.html/shopheader.png');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: beige;
            text-align: center;
        }

        .main-home h1 {
            font-size: 3em;
            font-weight: bold;
            text-transform: uppercase;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 40px 20px;
        }

        .product {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .product img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product h4 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .product p {
            margin-bottom: 15px;
            color: #555;
        }

        .product button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .product button:hover {
            background-color: #0056b3;
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

        .footer-links {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
            gap: 15px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .products {
                grid-template-columns: 1fr;
            }

            header ul {
                flex-direction: column;
                gap: 10px;
            }

            .main-home h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="headeri">
            <img src="FrontImg.html/Logo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="FrontPage.php">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="LogIn.php">Log in</a></li>
            <li><a href="LogOut.php">Log Out</a></li>
        </ul>
    </header>

    <section class="main-home">
        <h1>New Holiday Collection</h1>
    </section>

    <section class="products">
        <div class="product">
            <img src="FrontImg.html/Luxury Christmas tree 3000 LEDs H 180 cm.jpg" alt="Luxury Christmas tree">
            <h4>Luxury Christmas tree</h4>
            <p><s>€790.00</s> - <strong>€671.50</strong></p>
            <button>Add to Cart</button>
        </div>
        <div class="product">
            <img src="FrontImg.html/box of 9 glass balls.jpg" alt="Box of 9 glass balls">
            <h4>Box of 9 glass balls</h4>
            <p>€39.99</p>
            <button>Add to Cart</button>
        </div>
        <div class="product">
            <img src="FrontImg.html/fluffy cushion with embroidery 45x45cm.jpg" alt="Fluffy cushion">
            <h4>Fluffy Cushion</h4>
            <p>€34.00</p>
            <button>Add to Cart</button>
        </div>
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
