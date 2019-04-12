<?php

    session_start(); // starts or resumes an existing session

    //print_r($_POST); //display contents of POST (login credentials)

    include "dbConnection.php";
    
    $conn = getDatabaseConnection("ottermart");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    
    
    $sql = "SELECT * FROM om_admin WHERE username = :username AND password = :password";
    
    $namedParameters = array();
    $namedParameters[':username'] = $username;
    $namedParameters[':password'] = $password;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting only one record, so only use fetch instead of fetchAll

    //print_r($record); // see what we get back from the database

    if (empty($record))
    {
        header('location: ../index.php?error=true');
        $_SESSION['failure'] = "";
    }
    else
    {
        //echo $record['firstName'];
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header('location: admin.php'); // redirects to a new file named admin.php

    }

?>