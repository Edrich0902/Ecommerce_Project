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
        <title>Products</title>
        <!--CSS Import Links-->
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/jquery.toast.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/products.css" rel="stylesheet" type="text/css"/>
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
        <?php
            if(isset($_POST['addToCart']))
            {
                $_SESSION['cart'][] = array('id'=>$_POST['id'], 'qty'=>$_POST['qty']);
                ?>
        
                <script>                    
                    $.toast({
                        heading: "Cart",
                        text: "Product added to cart",
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
            }
        ?>
        <div class="productsContainer">          
            <!--<div>
                <form>
                    <img src="Images/smallVinyl.jpg" alt=""/>
                    <span>Small Vinyl</span>
                    <span>R100</span>
                    <input type='button' value="Add to cart"></input>
                </form>
            </div>-->
            <?php
                $conn = openCon();
                    
                $result = $conn->query("SELECT productPrice, ProductName, image, Products.productID FROM Products, ProductDescription
                            WHERE Products.productID = ProductDescription.productID;");
    
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo '<div>'
                                . '<form method="POST" action="products.php">'
                                    . '<img src=' . $row["image"] . '/>'
                                    . '<span>' . $row["ProductName"] . '</span>'
                                    . '<span>' . "R" . $row["productPrice"] . '</span>'
                                    . '<div id="qtyContainer"><span>Qty</span><input type="number" name="qty" id="qty"/></div>'
                                    . '<input type="text" hidden="true" name="id" value=' . $row['productID'] . '></input>'
                                    . '<input type="submit" value="Add to cart" name="addToCart"></input>'
                                . '</form>'
                            . '</div>';
                    }
                }
                else
                {
                    echo 'No Results';
                }

                closeCon($conn);
            ?>
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
