<?php

    session_start();
    
    //checks whether user has logged in
    if (!isset($_SESSION['adminName']))
    {
        
        header("Location: ../index.html"); // redirects to a new file named admin.php
        
    }
    
    include "dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "DELETE FROM `om_product` WHERE `om_product`.`productId` = " . $_POST["productId"];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");

?>
