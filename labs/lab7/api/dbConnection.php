<?php

    function getDatabaseConnection($dbname)
    {
        $host = "localhost";
    
        $username = "root";
        
        $password = "";
        
        //when connecting from Heroku
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 

        
        // Establishing a connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        return $dbConn;
    }



/*$sql = "SELECT * FROM om_product ORDER BY productPrice LIMIT 10";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); // displays array content which should be the 10 cheapest products

echo json_encode($records);

//echo $records[0]['productName'];*/

?>