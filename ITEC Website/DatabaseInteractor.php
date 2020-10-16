<?php
    /**
     * This class will handle all the database interactions for the web site
     * This is to ensure that the code is well organized throughout all the classes
     */
    session_start();
    include_once 'DatabaseConnection.php';
    if(isset($_POST["register"]))
    {
        $conn = openCon();
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $firstName = $_POST["name"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $cellphone = $_POST["cellphone"];
        
        $query = "INSERT INTO Clients VALUES"
                . " ('$username', '$password', '$firstName', '$lastName', '$email', '$cellphone');";
        
        if($conn->query($query))
        {
            $_SESSION["username"] = $username;
            $_SESSION["welcome"] = 0;
            header("Location: index.php");
        }
        else
        {
            $_SESSION["registerFail"] = true;
            echo '<script>window.location.href = "registerSignIn.php";</script>';
        }
        
        closeCon($conn);
    }
    
    if(isset($_POST["signIn"]))
    {
        $valid = false;
        $conn = openCon();

        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $query = "SELECT clientUsername, clientPw FROM Clients WHERE clientUsername = '" . $username . "';";
        
        $result = $conn->query($query);
        
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if($row["clientUsername"] == $username && $row["clientPw"] == $password)
                {
                    $valid = true;
                    $_SESSION["welcome"] = 0;
                    $_SESSION["username"] = $username;
                }
                else
                {
                    $valid = false;
                }
            }
        }
        else
        {
            $_SESSION["loginFailed"] = true;
        }
        
        if(!$valid)
        {
            $_SESSION["loginFailed"] = true;
            echo '<script>window.location.href = "registerSignIn.php";</script>';
        }
        elseif($valid)
        {
            header("Location: index.php");
        }
        
        closeCon($conn);
    }
    
    if(isset($_POST['checkout']))
    {
        $newOrderID = generateOrderNum();
        $user = $_SESSION["username"];
        $success = false;
        $conn = openCon();
        
        $query_orders = "INSERT INTO Orders VALUES(". $newOrderID .", '" . $user ."');"; //Add new order to orders table
        if($conn->query($query_orders))
        {
            echo 'new order created';
        }
        
        foreach ($_SESSION['cart'] as $array)
        {
            foreach ($array as $key=>$val)
            {
                if($key == "id")
                {
                    $prodId = $val;
                }
                elseif($key == "qty")
                {
                    $qty = $val;
                }
            }
            $query_orderDetails = "INSERT INTO OrderDetails VALUES(". $newOrderID .", ". $prodId .", ". $qty .");";
            if($conn->query($query_orderDetails))
            {
                $success = true;
                echo 'Items added to order';
            }
        }
        
        closeCon($conn);
        
        if($success)
        {
            unset($_SESSION['cart']);            
            unset($_SESSION['cartItems']);
            $_SESSION['ordered'] = true;
            header("Location: orders.php");
        }
    }