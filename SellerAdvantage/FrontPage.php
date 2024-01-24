
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;  /*Per me eliminu default space*/
            padding: 0;
            background-color: rgb(243, 243, 228);
           
            
        }
        /* Kodi per Header */

        header{
            display: flex;
            justify-content: space-between;
        }

        header li{
        margin-left: 7px;
        list-style-type: none;
        }

        header ul  {
        display: flex;
        justify-content: flex-end;
        }

 


        /*Kodi per pjesen e pare */
        .image-container img{
            width: 100%;
            margin-left: 0;
            height: auto;
        }
        .image-container{
            position: relative;
        }

        /* Responsive */
        .overlay-text {
             position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%);
             text-align: center;
             padding: 15px;
             color: black;
             opacity: 0.75;
             font-family: cursive;
             font-style: italic;
             box-sizing: border-box;
             max-width: 80%; 
          }

        @media only screen and (max-width: 425px) {
        .headeri img {
        height: 60px; /* Adjust header logo height for smaller screens */
    }

    header {
        flex-direction: column;
        align-items: center;
    }

    header ul {
        flex-direction: column;
        align-items: center;
    }

    header li {
        margin: 0;
        width: 100%;
        text-align: center;
    }

    .overlay-text {
        display: none; /* Hide the overlay text on smaller screens */
    }
}
      /* Kodi per 4-img */
        .containers{
            margin-top: 10px;
            align-items: center;
            justify-content: center;
            display: flex;            
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .containers img{
            width: 50px;
            margin-right: 30px;
            margin-left: 30px;
            opacity: 1;
        }
        .containers div{
            display: flex;
 
        }

   /* Pjesa e kodit per Slider */
 
   * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}


.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}


.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}


.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}


.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}


.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}


.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


@media only screen and (max-width: 600px) {
  .prev, .next,.text {font-size: 11px}
}

.slideshow-container img{
    width: 100%;
    height: 500px;
    
}


        /* Kodi per flexbox */

        .fotografite{
            display: flex;
            align-items: baseline;
            flex-wrap: wrap;
            margin-top: 80px;
        }

        .fotografite .image{
            width: 300px;
            margin-left: 130px;
            margin-right: 50px;
            border-radius: 10px;
            height: 255px;
            margin-top: 40px;
            margin-bottom: 40px;  
        }

        

        .container {
          position: relative;
        }

        .image {
           opacity: 1;
           display: block;
           width: 100%;
           height: auto;
           transition: .5s ease;
           backface-visibility: hidden;
       }
       .middle {
           transition: .5s ease;
           opacity: 0;
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           -ms-transform: translate(-50%, -50%);
           text-align: center;
       }
      .container:hover .image {
           opacity: 0.3;
        }
      .container:hover .middle {
           opacity: 1;
        }

      .textt {
          color: white;
          font-size: 16px;
          top: 40%;
          left: 10%;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
       }

        .info{
            text-align: center;
        }

        /* Kodi per pjesen e parafundit */


        .container3{
            background-color: white;
            padding-top: 90px;
            padding-bottom: 90px;
            width: 100%;
            opacity: 0.90;
            font-family: sans-serif;
            font-size: 20px;
        }
        
        .container3 .img2{
            float: right;
            margin-right: 200px;
            height: 300px;
            width: 500px;
           
            
        }

        .container3 .container3Tekst{
           display: inline-block;
           margin-left: 100px;
           margin-top: 30px;
        }

        .container3 h1{
            color: rgb(0, 0, 0);
        }

        .container3Tekst button{
            margin-left: 120px;
            border: none;
            width: 100px;
            height: 40px;
            background-color: black;
            
        } 

        /* Responsive */

         @media only screen and (max-width: 600px) {
    .container3 {
        padding-top: 30px;
        padding-bottom: 60px;
    }

    .container3 .img2 {
        float: none;
        margin-right: 0;
        margin-bottom: 20px; 
        width: 100%;
        border-radius: 0;
        margin-left: 60px;
    }

    .container3 .container3Tekst {
        margin-left: 20px;
        margin-top: 10px;
    }

    .container3 h1 {
        margin-left: 20px;
    }

    .container3Tekst button {
        margin-left: 20px;
    }
}



    /* Kodi per footer */
         footer{
           color: white;
           background-color: rgb(26, 24, 24);
           width: 100%;
           margin-top: 80px;
           padding-top: 90px;
           padding-bottom: 90px;
        }

        .footermain{
           display: flex;
           justify-content: space-around;
           font-family: Georgia;
           font-style: italic;
           
        }

        .f{
          color: white;
          text-decoration: underline;
          text-decoration-color: purple;
        
         } 

         /* Responsive Footer */
/* 
          @media screen and (max-width: 600px) {
    .footermain {
        flex-direction: column;
        text-align: center;
    }

    .footerleft,
    .footercenter,
    .footerright {
        margin-bottom: 20px;
    }
} */

   .btn_prev_next{
    border: none;
   }
   .numrat{
    border: none;
   }

   .nextpage{
    border: none;
   }
   .f{
    display: flex;
    justify-content: space-around;
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
                <li><a style="text-decoration: none; color: black;" href="#"></a>#</li>
                <li><a style="text-decoration: none; color: black;" href="ContactUs.php">Contact</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
            </ul>
        </header>
        
        
    

    <div class="image-container">
        <img  src="FrontImg.html/Foto1.jpg" alt="Foto1">
        <div class="overlay-text">
            <p style="font-size: 35px;">nature inspired design</p>
            <button style="padding: 10px; color: black; background-color: aliceblue; border: 0;"><a style="text-decoration: none; color: black;" href="#nav">Shop Now</a></button>
        </div>
        <div class="more-info">
             
        </div>
    </div>


    <div class="info" style="margin-bottom: 40px; margin-top: 40px;">
        <h2>Shop By Category</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
            Alias at, aliquid fugit accusantium dolore recusandae <br>
        aliquam harum voluptatem blanditiis. Fugiat laborum error</p>
    </div>

      <div class="containers">
         <div>
            <img src="FrontImg.html/furniture2.png" alt="bedroom">
            <p>Bedroom</p>
         </div>
         <div>
            <img src="FrontImg.html/furniture3.png" alt="bathroom">
            <p>Bathroom</p>
         </div>
         <div>
            <img src="FrontImg.html/furniture4.png" alt="kitchen">
            <p>Kitchen</p>
         </div>
         <div>
            <img src="FrontImg.html/furniture5.png" alt="garden">
            <p>Garden</p>
         </div>
    </div> 

   <!-- Pjesa e kodit per slider -->

   <div class="slideshow-container" style="margin-top: 50px;">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="FrontImg.html/slider-img.webp" >
      <div class="text">Newest Furniture</div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="FrontImg.html/slider-img2.webp" >
      <div class="text">Newest Furniture</div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="FrontImg.html/slider-img3.jpg" >
      <div class="text">Newest Furniture</div>
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>



<div id="nav">


    <div class="fotografite">

          <div class="container">
            <img class="image" src="FrontImg.html/fotografia1.webp" alt="">
                <p class="middle">
                    
                    <p class="textt">Rustic Furniture</p>
    
            </p>
          </div>
          <div class="container">
            <img class="image" src="FrontImg.html/fotografia2.webp" alt="">
            <p class="middle">
                
                <p class="textt">Japan Style</p>
    
            </p>
          </div>
          <div class="container">
            <img class="image" src="FrontImg.html/fotografia4.jpg" alt="">
            <p class="middle">
                
                <p class="textt">Eclectic Furniture</p>
 
            </p>
            
          </div>
          <div class="container">
            <img class="image" src="FrontImg.html/fotografia5.webp" alt="">
            <p class="middle">
                
                <p class="textt">Shabby Chic Furniture</p>

            </p>
          </div>
          <div class="container">
            <img class="image" src="FrontImg.html/fotografia6.jpg" alt="">
            <p class="middle">
                
                <p class="textt">Minimalistik Design</p>
   
            </p>
          </div>
          <div class="container">
            <img class="image" src="FrontImg.html/fotografia3.png" alt="">
            <p class="middle">
                
                <p class="textt">Coastal Furniture</p>
            
            </p>
          </div>
    </div>


    <div class="container3">
               <!-- <img class="img2"   src="" alt=""> -->
               <div class="container3Tekst">
                <h2 >Holiday Decor Shopping</h2>
                <!-- <h1 style="margin-left: 150px; color: red;">70% OFF</h1> -->
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                     Adipisci veniam, sed repellat nihil exercitationem quae <br>
                     voluptatem nostrum quisquam aliquid, animi ipsa, maiores <br>
                     libero ipsam beatae praesentium ea ratione delectus itaque!</p>
                     <button><a  style="color: white; text-decoration: none;" href="Shop.html">Click for more</a></button>

            </div>
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
          dots[slideIndex-1].className += " active";
        }
        </script>




</body>
</html>