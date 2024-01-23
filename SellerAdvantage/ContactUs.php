<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>

   body{
    background: #292929;
   }
        
   footer{
    width: 100%;
    height: auto;
    border-top: 20px solid #5b5b5b;
    margin: 40px 0 0 0;
}
footer::before{
    content:"";
    display: table;
    clear: both;
}
footer::after{
    content:"";
    display: table;
    clear: both;
}
.footer-first{
    margin:40px 0 0 20px;    
}
.footer-first::before{
    content:"";
    display: table;
    clear: both; 
}
.footer-first::after{
    content:"";
    display: table;
    clear: both; 
}
.contact{
    width: 50%;
    float: left;
}
.contact input{
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
    float: left;
    background: #1c1c1c;
    border: transparent;
    color: #cccccc;
}
.contact input[type="text"]:nth-child(4){
    display: inherit;
    width: 90%;
    margin-bottom: 10px;
    background: #1c1c1c;
    border: transparent;
    color: #cccccc;
}
.contact input[type="email"]{
    width: 43%;
    float: left;
    margin-left: 10px;
    margin-bottom: 10px;
    background: #1c1c1c;
    border: transparent;
    color: #cccccc;
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
.footer-second{
    margin: 0 20px 0 20px;
    position: relative;
}
.footer-second::before{
    content:"";
    display: table;
    clear: both;
    border-top: 1px solid #424242;
    position: absolute;
    left: 0;
    right: 0;
    width: 100%;
}
.footer-second::after{
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
.about-us{
    width: 50%;
    float: left;
}
.about-us h1{
    font-family: Georgia;
    font-size: 20px;
    font-style: italic;
    font-weight: 500;
    color: white;
}
.about-us p{
    font-family: Georgia;
    font-size: 13px;
    font-weight: 500;
    color: #cccccc;
    width:100%;
    line-height: 20.8px;
}
.about-us a{
    color: #3f9bb7;
    text-decoration: none;
    font-family: Georgia;
    font-weight: 500;
    font-size: 13px;
    float: right;
}

    </style>

</head>
<body>
    
    
     <!-- <footer>
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
        
    </footer>  -->
     <footer>
        <div class="footer-first">
            <div class="contact">
                <form action="#">
                    <h1>Contact us</h1>
                    <input type="text" required placeholder="Name">
                    <input type="email" required placeholder="Email">
                    <input type="text" required placeholder="Subject">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Message Here"></textarea>
                    <div>
                        <input type="submit" name="" id="" value="SUBMIT">
                    </div>
                </form>
            </div>
            <div class="link-blog">
                <div>
                    <h1>Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
                <div>
                    <h1>Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
                <div>
                    <h1>Lacus interdum</h1>
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
                <h1>From The Blog</h1>
                <h2>Sednulla nam nibh a nibh eu urna facinia.</h2>
                <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
                    elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula...</p>
                <h2>Sednulla nam nibh a nibh eu urna facinia.</h2>
                <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
                    elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula...</p>
            </div>
            <div class="details">
                <div class="our-details">
                    <h1>Our Details</h1>
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
                <div class="about-us">
                    <h1>About Us</h1>
                    <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
                        elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula conseque netus.</p>
                   

                  
                </div>
                <div class="newsletter">
                    <span>Newsletter:</span>
                    <input type="text" placeholder="Enter Email Here" required>
                    <input type="submit">
                </div>
            </div>
        </div> 
        <!-- <div class="copyright">
            <div class="copyright-container">
                <h1>Copyright &copy; 2018 - All Rights Reserved</h1>
                <h1>Template by Elinda Krasniqi</h1>
            </div>
        </div> 
     </footer> 
</body>
</html>