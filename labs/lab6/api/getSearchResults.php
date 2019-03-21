<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    $product = $_GET['productKeyword'];
    
    $namedParameters = array();
    
    //The code below works, but it allows for SQL injections because it uses single quotes
    //$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";
    
    $sql = "SELECT * FROM `om_product` WHERE 1";
    
    // checks whether the user has typed something into the Product text box
    if (!empty($product))
    {
        
        $sql .= " AND productName LIKE :product";
        $namedParameters[":product"] = "%$product%"; //prevents SQL injection
        
    }
    
    // checks whether the user has selected a category of product
    if (!empty($_GET['category']))
    {
        
        $sql .= " AND catID = :categoryId";
        $namedParameters[":categoryId"] = $_GET['category']; //prevents SQL injection
        
    }
    
    if (!empty($_GET['priceFrom']))
    {
        $sql .= " AND productPrice >= :priceFrom";
        $namedParameters[":priceFrom"] = $_GET['priceFrom'];
    }
    
    if (!empty($_GET['priceTo']))
    {
        $sql .= " AND productPrice <= :priceTo";
        $namedParameters[":priceTo"] = $_GET['priceTo'];
    }
    
    if (isset($_GET['orderBy']))
    {
        
        if ($_GET['orderBy'] == "price")
        {
            $sql .= " ORDER BY productPrice";
        }
        
        if ($_GET['orderBy'] == "name")
        {
            $sql .= " ORDER BY productName";
        }
        
    }
    
    $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
    $stmt->execute($namedParameters); // Have to pass named parameters in order for this bad boy to work
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

    //print_r($records);

    echo json_encode($records);

?>