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
        <title>My Orders</title>
        <!--CSS Import Links-->
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery.toast.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/orders.css" rel="stylesheet" type="text/css"/>
        <!--JavaScript Import Links-->
        <script src="JavaScript/jquery-3.5.0.js" type="text/javascript"></script>
        <script src="JavaScript/jquery.toast.min.js" type="text/javascript"></script>
        <script src="JavaScript/script.js" type="text/javascript"></script>
    </head>
    <body id="main">
        
        <?php
            if(isset($_SESSION['ordered']) == true)
            {
                ?>
        
                <script>                    
                    $.toast({
                        heading: "Order",
                        text: "Your order has been placed",
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
                unset($_SESSION['ordered']);
            }
        ?>
        
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
        
        <!--<div id="orderContainer">-->
            
            <?php
                $conn = openCon();
                
                $result = $conn->query("SELECT orderID FROM Orders WHERE clientUsername = '". $_SESSION["username"] ."';");
                
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo '<div class="order">'
                                . '<div class="orderTitle"><h4>Order '. $row['orderID'] .'</h4></div>';
                        
                        $result2 = $conn->query("SELECT productID FROM OrderDetails WHERE orderID=". $row['orderID'] .";");
                        if($result2->num_rows > 0)
                        {
                            while($row2 = $result2->fetch_assoc())
                            {
                                $result3 = $conn->query("SELECT image, prodDesc, qty, productPrice FROM Products, OrderDetails, ProductDescription WHERE
                                                        Products.productID = ". $row2['productID'] ." AND OrderDetails.productID = ". $row2['productID'] . "
                                                        AND ProductDescription.productID = ". $row2['productID'] ." 
                                                        AND Products.productID = OrderDetails.productID AND OrderDetails.orderID = ". $row['orderID'] .";");
                                
                                if($result3->num_rows > 0)
                                {
                                    while($row3 = $result3->fetch_assoc())
                                    {
                                        echo '<div>'
                                                . '<img src='. $row3['image'] .'/>'
                                                . '<span>'. $row3['prodDesc'] .'</span>'
                                                . '<span>Qty '. $row3['qty'] .'</span>'
                                                . '<span>R '. $res = $row3['qty'] * $row3['productPrice'] .'</span>'
                                           . '</div>';
                                    }
                                }
                            }
                        }
                        
                        echo '</div>'
                        . '</div>';
                    }
                }
                else
                {
                    echo '<h3>You have no orders yet<h3>';
                }
                
                closeCon($conn);
            ?>
        <!--</div>-->
            <!--<div class="order">
                <div class="orderTitle"><h4>Order 2004</h4></div>
                <div>
                    <img src="Images/mediumVinyl.jpg" alt=""/>
                    <span>Description</span>
                    <span>Qty 12</span>
                    <span>R50</span>
                </div>
            </div>-->
        
        
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
