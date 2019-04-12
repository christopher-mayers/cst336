<?php

    session_start();
    
    //checks whether user has logged in
    if (!isset($_SESSION['adminName']))
    {
        
        exit; // redirects to a new file named admin.php
        
    }

    include "dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    $productArray[":productName"] = $_GET['productName'];
    $productArray[":productDescription"] = $_GET['productDescription'];
    $productArray[":productImage"] = $_GET['productImage'];
    $productArray[":productPrice"] = $_GET['productPrice'];
    $productArray[":productCategory"] = $_GET['productCategory'];
    
    $sql = "INSERT INTO `om_product` (`productId`, `productName`, `productDescription`, `productImage`, `productPrice`, `catId`) 
    VALUES (NULL, :productName, :productDescription, :productImage, :productPrice, :productCategory)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($productArray);
    
    $sql = "SELECT COUNT(1) totalProducts FROM `om_product`"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($record);
    
?>