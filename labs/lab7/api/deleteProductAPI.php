<?php

    session_start();
    
    //checks whether user has logged in
    if (!isset($_SESSION['adminName']))
    {
        
        exit; // redirects to a new file named admin.php
        
    }

    include "dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    $productArray = array();
    
    $productArray[":productName"] = $_GET['productName'];
    $productArray[":productDescription"] = $_GET['productDescription'];
    $productArray[":productImage"] = $_GET['productImage'];
    $productArray[":productPrice"] = $_GET['productPrice'];
    $productArray[":productCategory"] = $_GET['productCategory'];
    //$productArray[":productId"] = ;
    
    $sql = "UPDATE om_product
            SET productName = :productName,
                productDescription = :productDescription,
                productImage = :productImage,
                productPrice = :productPrice,
                catId = :productCategory
            WHERE om_product.productId = " . $_GET['productId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($productArray);

?>