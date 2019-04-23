<?php

    include "dbConnection.php";
    
    $conn = getDatabaseConnection("hw8");

    $vars = array();

    $address = $_GET['address'];
    $zip = $_GET['zip'];
    $price = $_GET['price'];
    $link = $_GET['link'];

    $sql = "SELECT * FROM houseInfo";
    $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    
    $alreadyIn = 'false';
    
    for ($i = 0; $i < count($records); $i++)
    {
        
        if ($records[$i]['link'] == $link)
        {
            $alreadyIn = 'true';
        }
        
    }

    if ($alreadyIn == 'false')
    {
        $vars[':address'] = $address;
        $vars[':zip'] = $zip;
        $vars[':price'] = $price;
        $vars[':link'] = $link;
        
        $sql = "INSERT INTO `houseInfo` (`address`, `zip`, `price`, `link`) VALUES (:address, :zip, :price, :link)";
        $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
        $stmt->execute($vars);
        
    }
    else
    {

        echo ('bad');
    }
    
?>