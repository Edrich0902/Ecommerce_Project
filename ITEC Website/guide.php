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
        <title>Application Guide</title>
        <!--CSS Import Links-->
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery.toast.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/guide.css" rel="stylesheet" type="text/css"/>
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
        
        <div class="guideTitle">
            <h2>How to apply our product?</h2>
        </div>
        
        <div class="stepsContainer">
            <div id="forCars">
                <h3>For Cars</h3>
                <div>
                    <h4>Step 1</h4>
                    <p>
                        Before applying the vinyl to your car, thoroughly clean 
                        the surface to ensure no dust gets caught under the 
                        vinyl on application
                    </p>
                </div>
                <div>
                    <h4>Step 2</h4>
                    <p>
                        Now carefully remove the adhesive backing from the vinyl
                        without damaging the vinyl 
                    </p>
                </div>
                <div>
                    <h4>Step 3</h4>
                    <p>
                        When the backing has been removed the vinyl can be lined
                        up where it is to be placed.
                    </p>
                </div>
                <div>
                    <h4>Step 4</h4>
                    <p>
                        When the vinyl is in place gently press down on it or 
                        rub over the sticker with a cloth to ensure the vinyl 
                        sticks to the surface.
                    </p>
                </div>
                <div>
                    <h4>Step 5</h4>
                    <p>
                        Now you can gently and carefully remove the second 
                        adhesive backing from the vinyl. If all was done 
                        successfully the backing should remove while the vinyl 
                        sticks to the surface.<br/><br/>
                        
                        Now you're done and your vinyl should look great
                        on its new surface
                    </p>
                </div>
            </div>
            
            <div id="forClothes">
                <h3>For Clothes</h3>
                
                <div>
                    <h4>Step 1</h4>
                    <p>
                        Firstly take the vinyl and line it up in the position
                        where you want it to be placed
                    </p>
                </div>
                <div>
                    <h4>Step 2</h4>
                    <p>
                        When the vinyl is in place it should now be heat
                        transferred with the use of an iron. Place a cloth over
                        the vinyl to prevent the plastic backing from melting. 
                        And gently press down on the cloth and vinyl with a hot 
                        iron. A press can also be used instead of an iron.
                    </p>
                </div>
                <div>
                    <h4>Step 3</h4>
                    <p>
                        After ironing the vinyl you can now gently remove the
                        plastic backing from the vinyl. If all was done
                        successfully the vinyl should stick to the cloth while
                        the plastic backing is removed
                    </p>
                </div>
                <div>
                    <h4>Step 4</h4>
                    <p>
                        Your vinyl should now be in place and looking amazing
                    </p>
                </div>
            </div>
        </div>
        
        <div class="stillStuck">
            <h2>Are you still unsure of the application process</h2>
            <p>Watch these videos below for a more detailed guide</p>
        </div>
        
        <div class="videoContainer">
            <div>
                <h3>For Cars</h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/U5a1Dsoi9uY"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media;
                        gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div>
                <h3>For Clothes</h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/8-gDqqd3YwI" 
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; 
                    gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>    
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
