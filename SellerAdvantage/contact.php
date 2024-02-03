<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: LogIn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <style>

body{
    background-color: rgb(243, 243, 228);
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

      /* header .headeri {
         padding: 10px; 
     } */

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
     
    .contact-form{
       /* width: 100%; */
       height: auto;
       /* border-top: 20px solid ; */
       margin: 40px 0 0 0;
    }
.contact-form::before{
 content:"";
 display: table;
 clear: both;
}
.contact-form::after{

 content:"";
 display: table;
 clear: both;
}
.first{
 margin:40px 0 0 20px;    
}
.first::before{
 content:"";
 display: table;
 clear: both; 
}
.first::after{
 content:"";
 display: table;
 clear: both; 
}
.contact{
 width: 50%;
 float: left;
}
.contact-form input{
 height: 26px;
 padding-left: 9px;
 
}
.contact *{
 font-family: Verdana;
 font-weight: 500;
}
.contact::before{
 content:"";
 display: table;
 clear: both;
}
.contact::after{
 content:"";
 display: table;
 clear: both;
}
.contact input[type="text"]:nth-child(2){
 width: 45%;
 /* float: left; */
 background: #1c1c1c;
 border: transparent;
 color: #cccccc;
 text-align:center;
}
/* .contact input[type="text"]:nth-child(4){
 display: inherit;
 width: 90%;
 margin-bottom: 10px;
 background: #1c1c1c;
 border: transparent;
 color: #cccccc;
} */
.contact input[type="email"]{
 width: 45%;
 /* float: left; */
 margin-top:5px;
 /* margin-left: 10px; */
 margin-bottom: 10px;
 background: #1c1c1c;
 border: transparent;
 color: #cccccc;
 text-align:center;
}
.contact textarea{
 display: inherit;
 width: 90%;
 height: 60px;
 background: #1c1c1c;
 border: transparent;
 resize: unset;
 color: #cccccc;
 padding-left: 9px;
 text-align:center;

}.contact input[type="submit"]{
 background: #333333;
 border: transparent;
 height: 30px;
 margin-top: 10px;
 color: #cccccc;
 width: 100px;
 cursor: pointer;
}

::placeholder {
 color: #cccccc;
 opacity: 1; 
}
.contact form{
 margin: 0;
 float: left;
}
.contact form h1{
 font-size: 20px;
 font-family: Georgia;
 font-style: italic;
 color: #cccccc;
 text-transform: capitalize;
}

.contact div{
 float: left;
 width: 90%;
}
.contact div input{
 float: right;
}
.link-blog{
 width: 50%;
 float: left;
}
.link-blog::before{
 content:"";
 display: table;
 clear: both;
}
.link-blog::after{
 content:"";
 display: table;
 clear: both;
}
.link-blog div{
 width: 33.3%;
 float: left;
}
.link-blog div h1{
 font-size: 20px;
 font-family: Georgia;
 font-style: italic;
 color:white;
 font-weight: 500;
 margin-bottom: 21px;
}
.link-blog div h3{
 font-size: 13px;
 font-family: Georgia;
 font-weight: 500;
 color: #3f9bb7;
 margin-bottom: 21px;
}
.second{
 margin: 0 20px 0 20px;
 position: relative;
}
.second::before{
 content:"";
 display: table;
 clear: both;
 border-top: 1px solid #424242;
 position: absolute;
 left: 0;
 right: 0;
 width: 100%;
}
.second::after{
 content:"";
 display: table;
 clear: both;
 
}
.blog-posts{
 width: 50%;
 float: left;
}
.blog-posts h1{
 font-size: 20px;
 font-family: Georgia;
 font-style: italic;
 color: white;
}
.blog-posts h2{
 font-family: Georgia;
 font-size: 13px;
 font-weight: 500;
 color: #3f9bb7;
}
.blog-posts p{
 font-family: Georgia;
 font-size: 13px;
 font-weight: 500;
 color: #cccccc;
 width:90%;
 line-height: 20.8px;
}
.blog-posts h2:nth-child(2){
 margin-top: 21px;
}
.blog-posts h2:nth-child(4){
 margin-top: 33px;
}
.details{
 width: 50%;
 float: left;
}
.our-details{
 width: 50%;
 float: left;
}
.our-details h1{
 font-family: Georgia;
 font-weight: 500;
 font-style: italic;
 color: white;
 font-size: 20px;
}
.our-details span{
 display: block;
 font-size: 13px;
 font-weight: 500;
 color:#cccccc;

}
.our-details span:nth-child(2),.our-details span:nth-child(6),.our-details span:nth-child(8),
.our-details span:nth-child(10){
 color: #6b6b6b;
}
.our-details span:nth-child(6){
 margin-top: 23px;
}
.our-details a{
 color: #3f9bb7;
 text-decoration: none;
 font-family: Georgia;
 font-weight: 500;
 font-size: 13px;
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
                <li><a style="text-decoration: none; color: black;" href="AboutUs.php">AboutUs</a></li>
                <li><a style="text-decoration: none; color: black;" href="contact.php">Contact</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogOut.php">Log Out</a></li>
              
            </ul>
        </header>

    <div class="contact-form">

    <div class="first">
        <div class="contact">
        <form action="saveMessage.php" method="post">
        <label for="username"></label>
        <input type="text" id="username" name="username" placeholder="username" required><br>

        <label for="email"></label>
        <input  type="email" id="email" name="email" placeholder="email" required><br>

        <label for="message"></label>
        <textarea style="width:500px;" id="message" name="message" rows="4" placeholder="message" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
        </div>
    
    

    <div class="link-blog">
                <div>
                    <h1 style="color:black;">Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
                <div>
                    <h1 style="color:black;">Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
                <div>
                    <h1 style="color:black;">Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>>Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
            </div>
        </div>
        <div class="footer-second">
            <div class="blog-posts">
                <h1 style="color:black;">From The Blog</h1>
                <h2>Sednulla nam nibh a nibh eu urna facinia.</h2>
                <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
                    elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula...</p>
                <h2>Sednulla nam nibh a nibh eu urna facinia.</h2>
                <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
                    elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula...</p>
            </div>
            <div class="details">
                <div class="our-details">
                    <h1 style="color:black;">Our Details</h1>
                    <span>Company name</span>
                    <span>Street Name & Number</span>
                    <span>Town</span>
                    <span>Postcode/Zip</span>
                    <span>Tel:</span>
                    <span>xxxxx xxxxxxxxxx</span>
                    <span>Fax:</span>
                    <span>xxxxx xxxxxxxxxx</span>
                    <span>Email:</span>
                    <a href="mailto:ab65060@ubt-uni.net">ab65060@ubt-uni.net</a>
                </div>
                <div class="newsletter">
                    <span>Newsletter:</span>
                    <input type="text" placeholder="Enter Email Here" required>
                    <input type="submit">
                </div>
            </div>
        </div>
</div> 

</body>

</html>
