<?php
include 'dbConnect.php';

$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

$sql = "SELECT * FROM staff";
$result = $data->query($sql);

if (!$result) {
    die("SQL query failed: " . $data->errorInfo()[2]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUs</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">

    <style>
        body {
            background-color: rgb(243, 243, 228);
            margin: 0;
            padding: 0;
        }

        header {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         display: flex;
         justify-content: space-between;
         z-index: 1000;
         background-color: transparent; 
     }

      header .headeri {
         padding: 10px; 
     }

     header ul {
        display: flex;
        justify-content: flex-end;
        list-style-type: none;
        margin: 0;
        padding: 0;
        font-size:20px;
        margin-top: 10px;
     }

    header li {
        margin: 0 15px;
    }

    header a {
       text-decoration: none;
       color: black;
    }

    .row {
        display: flex;
        justify-content: space-around; 
        flex-wrap: wrap; 
    }

    .content {
        width: 30%; 
        margin-bottom: 20px; 
    }

       
    @media (max-width: 768px) {
        .content {
            width: 45%; 
        }
    }

    @media (max-width: 576px) {
        .content {
            width: 100%; 
        }
    }





    
        /* pjesa e pare e about us */

        section {
            padding: 5% 10%;
        }

        .main-home {
            width: wrap;
            height: 350px;
            background-image: url(FrontImg.html/aboutus6.jpg);
            background-position: center;
            background-size: cover;
            display: grid;
            align-items: picture-in-picture;
            text-align: right;
        }

        .main-text h1 {
            color: white;
            font-size: 90px;
            font-style: italic;
        }

        .heading {
            text-align: center;
            color: rgb(61, 39, 7);
            text-transform: uppercase;
            padding-bottom: 10px;
            font-size: 70px;
        }

        .heading span {
            color: rgb(61, 39, 7);
            text-transform: uppercase;
        }
     
     
        @media (max-width: 600px) {
    section {
        padding: 5% 5%; 
    }

    .main-home {
        height: 200px; 
        background-size: contain; 
        text-align: center; 
    }

    .main-text h1 {
        font-size: 40px; 
    }

    .heading {
        font-size: 40px; 
    }

    .content {
        min-width: 100%; 
        max-width: 100%; 
        margin-right: 0; 
    }
}

     /* About section */
 .about {
   background-color: #f9f9f9;
    padding: 50px 0;
    text-align: center;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.heading {
    color: #333;
    font-size: 36px;
    margin-bottom: 30px;
}

.row {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.image {
    margin-bottom: 30px;
}

.image img {
    max-width: 100%;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.content {
    max-width: 800px;
    margin: 0 auto;
}

.content h3 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.content p {
    color: #666;
    font-size: 18px;
    line-height: 1.6;
}

    /* Customers*/


.customers {
    padding: 5% 10%;
}

.customers .heading h2 {
    font-size: 50px; 
    text-align: center; 
    margin-bottom: 30px; 
}

.customers-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
    gap: 20px; 
    justify-content: center;
}

.customers-container .box {
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    background-color: #fff; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    transition: all 0.3s ease; 
}

.customers-container .box:hover {
    transform: translateY(-5px); 
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
}

.stars .bx {
    color: #FFD700; 
}

.customers-container .box p {
    font-size: 18px; 
    color: #666; 
    margin-bottom: 20px;
}

.customers-container .box h2 {
    font-size: 24px; 
    color: #333; 
    margin-bottom: 10px; 
}

.customers-container .box img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px; 
}



        /* footeri */

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

    </style>
</head>

<body>

<header>
    <div class="headeri">
        <img src="FrontImg.html/Logo.png" height="90px" alt="logo">
    </div>
    <ul>
        <li><a style="text-decoration: none; color: black;" href="FrontPage.php">Home</a></li>
        <li><a style="text-decoration: none; color: black;" href=" AboutUs.php">About Us</a></li>
        <li><a style="text-decoration: none; color: black;" href="contact.php">Contact</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogOut.php">Log Out</a></li>
    </ul>
</header>

<section class="main-home">
    <div class="main-text">
        <h1> Where culture
            <br>
            and creativity collide!
        </h1>
    </div>
</section>

<!-- About Staff -->
<section class="about" id="about">
    <div class="container">
        <h1 class="heading">About Staff</h1>
        <div class="row">
            <!-- Loop through staff members and display their information -->
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="content">
                    <h3><?= $row['name']; ?></h3>
                    <p><?= $row['experiences']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- About Us-->

<section class="about" id="about">
  <div class="container">
      <h1 class="heading"> About Us </h1>
      <div class="row">
          <div class="image">
              <img src="FrontImg.html/Aboutus3.jpg" alt="About Us Image">
          </div>
          <div class="content">
              <h3>What makes us special?</h3>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est quis illum officiis odit consequuntur at reprehenderit asperiores voluptas. Quisquam molestias ex perspiciatis, minus error eaque in distinctio quae itaque culpa! Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ut ea modi ipsa quo voluptate quasi itaque amet praesentium corrupti natus, porro architecto iste voluptates tempora, rem molestias dignissimos inventore.</p>
          </div>
      </div>
  </div>
</section>


<!-- Customers-->
<section class="customers" id="customers">
    <div class="heading">
        <h2>Our Customers</h2>
    </div>

    <!-- Container  -->

    <div class="customers-container">
        <div class="box">
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Dolorum quidem perspiciatis deleniti, eligendi nihil consequuntur recusandae esse quasi
                doloribus repellat eveniet quae facilis et aliquam quod odio obcaecati est alias.</p>
            <h2>Yasin Ali</h2>
            <img src="FrontImg.html/customer2.jpg" alt="">
        </div>

        <div class="box">
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Dolorum quidem perspiciatis deleniti, eligendi nihil consequuntur recusandae esse quasi
                doloribus repellat eveniet quae facilis et aliquam quod odio obcaecati est alias.</p>
            <h2>Yasin Ali</h2>
            <img src="FrontImg.html/customer1.jpg" alt="">
        </div>

        <div class="box">
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Dolorum quidem perspiciatis deleniti, eligendi nihil consequuntur recusandae esse quasi
                doloribus repellat eveniet quae facilis et aliquam quod odio obcaecati est alias.</p>
            <h2>Yasin Ali</h2>
            <img src="FrontImg.html/customer3.jpg" alt="">
        </div>
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
