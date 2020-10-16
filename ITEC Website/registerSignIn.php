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
        <title>Register or Sign In</title>
        <!--CSS Import Links-->
        <link href="CSS/jquery.toast.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/registerSignIn.css" rel="stylesheet" type="text/css"/>
        <!--JavaScript Import Links-->
        <script src="JavaScript/jquery-3.5.0.js" type="text/javascript"></script>
        <script src="JavaScript/jquery.toast.min.js" type="text/javascript"></script>
        <script src="JavaScript/script.js" type="text/javascript"></script>   
        <script src="JavaScript/registrationSignIn.js" type="text/javascript"></script>
        <script src="JavaScript/inputValidator.js" type="text/javascript"></script>
    </head>
    <body>
        
        <script>
            function invalidInputToast()
            {
                $.toast({
                    heading: "Invalid Input",
                    text: "Invalid input received",
                    bgColor: "#FFB347",
                    textColor: "F3F3F3",
                    showHideTransition: "slide",
                    allowToastClose: false,
                    position: "bottom-center",
                    icon: "error",
                    loaderBg: "#000000",
                    hideAfter: 3000
                });
            }
            
            function emptyInputToast()
            {
                $.toast({
                    heading: "Empty Input",
                    text: "Some fields are empty and need to be entered",
                    bgColor: "#FF6961",
                    textColor: "F3F3F3",
                    showHideTransition: "slide",
                    allowToastClose: false,
                    position: "bottom-center",
                    icon: "error",
                    loaderBg: "#000000",
                    hideAfter: 3000
                });
            }
        </script>
        
        <?php
            if(isset($_SESSION['loginFailed'])){?>
                <script>
                    $.toast({
                        heading: "Login Invalid",
                        text: "No account with that username and password",
                        bgColor: "#FF6961",
                        textColor: "F3F3F3",
                        showHideTransition: "slide",
                        allowToastClose: false,
                        position: "bottom-center",
                        icon: "error",
                        loaderBg: "#000000",
                        hideAfter: 3000
                    });
                </script>
                        
            <?php
            /*Clears the login failed variable so that it does not 
            * trigger a failed message without another failed 
            * attempt*/
                unset($_SESSION['loginFailed']);
            }
            ?>
                
        <?php
            if(isset($_SESSION['registerFail'])){?>
                <script>
                    $.toast({
                        heading: "Registration Failed",
                        text: "Unfortunately the registration process failed",
                        bgColor: "#FF6961",
                        textColor: "F3F3F3",
                        showHideTransition: "slide",
                        allowToastClose: false,
                        position: "bottom-center",
                        icon: "error",
                        loaderBg: "#373741",
                        hideAfter: 3000
                    });
                </script>
                        
            <?php
            /*Clears the login failed variable so that it does not 
            * trigger a failed message without another failed 
            * attempt*/
                unset($_SESSION['loginFailed']);
            }
            ?>         
        
        <h2 id="registrationTitle">Registration - Sign In</h2>
        <div class="registraionContainer">
            <div class="tabs">
                <input type="button" value="Register" name="register" class="tablinks" onclick="setActiveTab(event), changeContent('reg')"/>
                <input type="button" value="Sign In" name="signIn" class="tablinks" onclick="setActiveTab(event), changeContent('sign')"/>
            </div>
            
            <div class="register" id="reg">
                <form method="POST" action="DatabaseInteractor.php" onsubmit="return registerValidation()">
                    <div>
                        <img src="Images/user.png" alt=""/>
                        <input type="text" name="username" placeholder="USERNAME" />
                    </div>
                    <div>
                        <img src="Images/password.png" alt=""/>
                        <input type="password" name="password" placeholder="PASSWORD" />                    
                    </div>
                    <div>
                        <img src="Images/name.png" alt=""/>
                        <input type="text" name="name" placeholder="FIRST NAME" />                    
                    </div>
                    <div>
                        <img src="Images/name.png" alt=""/>
                        <input type="text" name="lastName" placeholder="LAST NAME" />                    
                    </div>
                    <div>
                        <img src="Images/mail.png" alt=""/>
                        <input type="text" name="email" placeholder="EMAIL" />                    
                    </div>
                    <div>
                        <img src="Images/phone.png" alt=""/>
                        <input type="text" name="cellphone" placeholder="CELLPHONE" />                    
                    </div>

                    <input type="submit" value="Register" name="register" id="registerBut"/>
                </form>
            </div>
            
            <div class="signIn" id="sign">
                <form method="POST" action="DatabaseInteractor.php" onsubmit="return signInValidation()">
                    <div>
                        <img src="Images/user.png" alt=""/>
                        <input type="text" name="username" placeholder="USERNAME" />
                    </div>
                    <div>
                        <img src="Images/password.png" alt=""/>
                        <input type="password" name="password" placeholder="PASSWORD" />                    
                    </div>

                    <input type="submit" value="Sign In" name="signIn" id="signInBut"/>
                </form>
            </div>
        </div>
    </body>
</html>
