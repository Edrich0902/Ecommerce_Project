<?php
    session_start();
    include_once 'DatabaseConnection.php';
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
        <title>My Cart</title>
        <!--CSS Import Links-->
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery.toast.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/cart.css" rel="stylesheet" type="text/css"/>
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
              
        <div class="cart">
            <?php
                if(isset($_POST['delete']))
                {
                    foreach ($_SESSION['cart'] as $key=>$item){
                        if($item['id'] == $_POST['id']){
                            unset($_SESSION['cart'][$key]);?>
            
                            <script>                    
                                $.toast({
                                    heading: "Cart",
                                    text: "Product removed from cart",
                                    bgColor: "black",
                                    textColor: "#F3F3F3",
                                    showHideTransition: "slide",
                                    allowToastClose: false,
                                    position: "bottom-center",
                                    icon: "success",
                                    loaderBg: "magenta",
                                    hideAfter: 3000
                                });
                            </script> 
            <?php
                            break;
                        }
                    }
            ?>        
                    
                             
            <?php
                }
                if(isset($_SESSION['cart']))
                {
                    $count = 0;
                    $total = 0;

                    foreach ($_SESSION['cart'] as $array)
                    {
                        foreach ($array as $key=>$val)
                        {

                            if($key == "id")
                            {
                                $id = $val;
                            }
                            elseif($key == "qty")
                            {
                                $qty = $val;
                            }
                        }
                        //echo $id . " " . $qty . "<br>";
                        $conn = openCon();    
                        $result = $conn->query("SELECT image, productName, productPrice FROM Products, ProductDescription
                                                WHERE Products.productID = ". $id ." AND ProductDescription.productID = ". $id .";");

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo '<div>'
                                        . '<form method="POST" action="cart.php">'
                                            . '<img src='. $row["image"] .'/>'
                                            . '<span>'. $row["productName"] .'</span>'
                                            . '<span>Qty '. $qty .'</span>'
                                            . '<span>'. 'R' . $row["productPrice"] .'</span>'
                                            . '<input type="text" hidden="true" id="hidden" name="id" value="'. $id .'"/>'
                                            . '<div id="container"><input type="submit" name="delete" class="delete"/></div>'
                                        . '</form>'
                                    . '</div>'; 

                                $total += $row["productPrice"] * $qty;
                            }
                        }
                        else
                        {
                            echo "No Results";
                        }
                        $count += $qty;
                    }

                    echo '<div class="checkout">'
                            . '<form method="POST" action="DatabaseInteractor.php">'
                            . '<span id="total"></span>'
                            . '<span>Total</span>'
                            . '<span>Qty '. $count .'</span>'
                            . '<span>R'. $total .'</span>'
                            . '<div id="container"><input type="submit" value="Checkout" name="checkout" class="checkoutBut"/></div>'
                            . '</form>'
                        . '</div>';

                    $_SESSION['cartItems'] = $count;
                }
                else
                {
                    echo '<h2>Your cart is empty<h2>';
                }
            ?>
            <!--<div>
                <form method='POST' action='cart.php'>
                    <img src="Images/mediumVinyl.jpg" alt=""/>
                    <span>Description or product name</span>
                    <span>R300</span>
                    <input type="text" hidden="true" name="id" value=""/>
                    <input type="submit" value="" name='delete' class='delete'/>
                </form>
            </div>-->
            <!--<div class="checkout">
                <form>
                    <span id="total">14 items</span>
                    <span>Total</span>
                    <span>R1500</span>
                    <div id="container"><input type="submit" value="Checkout" name="checkout" class="checkoutBut"/></div>
                </form>
            </div>-->
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
