<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($record);

?>