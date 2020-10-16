<?php
/**
 * Opens and establishes the connection with the database
 * @return the connection variable
 */
function openCon()
{
    $servername = "localhost";
    $username = "root";
    $password = "P@ssword1";
    $db_name = "VinylDB";

    $conn = new mysqli($servername, $username, $password, $db_name) 
            or die("Connection Failed:%s\n".$conn->error);
        
    return $conn;
}

/**
 * Closes the connection with the database
 * @param type $conn
 */
function closeCon($conn)
{
    $conn -> close();
}

/**
* Gets the latest orderNum and returns a new number incremented by 1
* @return type
*/
function generateOrderNum()
{
    $conn = openCon();
    $result = $conn->query("SELECT orderID FROM Orders;");
    if($result->num_rows > 0)
    {
        $biggest = 0;
        while($row = $result->fetch_assoc())
        {
            if($row['orderID'] > $biggest)
            {
                $biggest = $row['orderID'];
            }
        }
    }
    return $biggest + 1;
 }