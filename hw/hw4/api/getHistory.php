<?php

    include "dbConnection.php";
    
    $conn = getDatabaseConnection("hw8");

    $sort = $_GET['sort'];
    
    if ($sort == "ascending")
    {
        
        $sql = "SELECT * FROM `houseInfo` ORDER BY `houseInfo`.`price` ASC";
        $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
        
    }
    
    else if ($sort == "descending")
    {
        
        $sql = "SELECT * FROM `houseInfo` ORDER BY `houseInfo`.`price` DESC";
        $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
        
    }
    
    else if ($sort == "no")
    {
        
        $sql = "SELECT * FROM houseInfo";
        $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
        
    }

    echo json_encode($records);

?>