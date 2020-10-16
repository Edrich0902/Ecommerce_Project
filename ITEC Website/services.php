<?php 
    session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Services</title>
        <!--CSS Import Links-->
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery.toast.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/services.css" rel="stylesheet" type="text/css"/>
        <!--JavaScript Import Links-->
        <script src="JavaScript/jquery-3.5.0.js" type="text/javascript"></script>
        <script src="JavaScript/jquery.toast.min.js" type="text/javascript"></script>
        <script src="JavaScript/script.js" type="text/javascript"></script>
    </head>
    <body id="main">
        <div class="topNav">
            <div class="navList">
                <ul>
                    <li onclick="navigate('home')">Home</li>
                    <li onclick="navigate('products')">Products</li>
                    <li onclick="navigate('about')">About</li>
                    <li onclick="navigate('services')">Services</li>
                </ul>
            </div>
            <div id="menu" onclick="changeHam()">
                <div class="bar" id="bar1"></div>
                <div class="bar" id="bar2"></div>
                <div class="bar" id="bar3"></div>
            </div>
            <div class="title">
                <span onclick="navigate('home')">Vinyl Craft Creations</span>
            </div>
            <div class="accountInfo">
                    <?php
                    if(isset($_SESSION["username"]))
                    {?>
                        <img src="Images/profileImg.png" alt="" id="profileImg" onclick="profileOption()"/>
                        <span id="username" onclick="profileOption()"><?php echo $_SESSION["username"]?></span>
                    <?php
                    }
                    else
                    {?>
                        <span id="signInRegister" onclick="navigate('registerSignIn')">Sign In/Register</span>
                    <?php
                    
                    }?>
                <!--<img src="Images/profileImg.png" alt="" id="profileImg" onclick="profileOption()" style="display: none"/>
                <span id="username" onclick="profileOption()" style="display: none"></span>
                <span id="signInRegister" onclick="navigate('registerSignIn')">Sign In/Register</span>-->
            </div>
        </div>
        <div class="profileOptions" id="profOpt">
            <div onclick='navigate("cart")'>Cart <?php
            if(isset($_SESSION['cartItems'])){
                
                echo "(" . $_SESSION['cartItems'] . ")";
            }
            
            ?></div>
            <div onclick="navigate('orders')">Orders</div>
            <div onclick="logout()">Log out</div>
        </div>
        
        <div id="side" class="sideNav">
            <span onclick="navigate('home')">Home</span>
            <span onclick="navigate('products')">Products</span>
            <span onclick="navigate('about')">About</span>
            <span onclick="navigate('services')">Services</span>
        </div>
        
        <div class="whatWeDoTitle">
            <h2>What we do for you</h2>
        </div>
        
        <div class="whatWeDoSteps">
            <figure>
                <img src="Images/vinylDesign.jpg" alt=""/>
                <figcaption>Send your design via email or order one of ours</figcaption>
            </figure>
            
            <figure>
                <img src="Images/vinylCut.jpg" alt=""/>
                <figcaption>We cut your design for you</figcaption>
            </figure>
            
            <figure>
                <img src="Images/vinylApplication.jpg" alt=""/>
                <figcaption>We deliver your product</figcaption>
            </figure>
            
            <figure>
                <img src="Images/vinyl_example1.jpg" alt=""/>
                <figcaption>For R50 extra we apply it for you</figcaption>
            </figure>
        </div>
        
        <div class="otherApplicationsTitle">
            <h2>Other applications</h2>
        </div>
        
        <div class="otherApplications">
            <figure>
                <img src="Images/vinylCarApplication.jpg" alt=""/>
                <figcaption>Car</figcaption>
            </figure>
            
            <figure>
                <img src="Images/vinylWallApplication.jpg" alt=""/>
                <figcaption>Walls and other surfaces</figcaption>
            </figure>
        </div>
        
        <div class="addInfo">
            <p>
                We can only apply your product on clothing for you. Other surfaces require you to apply it yourself.
                But feel free to look at our guide on how the application process works
            </p>
        </div>
        <div class="link">
            <a href="guide.php" id="guideLink">Visit our online guide here!</a>
        </div>
        <div class="footer">
            <span class="footerContactTitle"><span> </span><span id="contactUs">Contact Us</span> <a href="#" onclick="toTop()" id="toTopLink">Back To Top</a></span>
            <div class="contactUs">
                <span>0846723836</span>
                <span>email@email.com</span>
                <span>Facebook</span>
            </div>
            
            <div class="copyright">
                Copyright &#169 2020 Vinyl Craft Creations
            </div>
        </div>
    </body>
</html>
