<?php

    include "dbConnection.php";
    
    $conn = getDatabaseConnection("c9");

    //receives action, url and keyword
    
    
    $action = $_GET['action'];
    $url = $_GET['url'];
    $keyword = $_GET['keyword'];
    
    $vars= array();
    
    if ($action == "add")
    {
        
        $sql = "INSERT INTO lab8_pixabay (`imageURL`, `keyword`) VALUES (:url, :keyword)";
        
        $vars[":url"] = $url;
        $vars[":keyword"] = $keyword;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($vars);
        
    }
    else if ($action == "delete")
    {
        
        $sql = "DELETE FROM lab8_pixabay WHERE imageURL = :url";
        
        $vars[":url"] = $url;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($vars);
        
    }
    else if ($action == "keyword")
    {
        
        $sql = "SELECT DISTINCT keyword FROM lab8_pixabay";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($record);
        
    }
    else if ($action == "favorites")
    {
        $sql = "SELECT imageURL FROM lab8_pixabay WHERE keyword = :keyword";
        
        $vars[":keyword"] = $keyword;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($vars);
        
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($record);
        
        
    }

?>