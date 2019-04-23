<?php

    //http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz1h126tr51cb_86zet&address=21070+Niagara+River+Drive&citystatezip=Sonora%2C+CA

    $address = $_GET['address'];
    $zip = $_GET['zip'];
    
    $newAddress = str_replace(' ', '+', $address);

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        
        CURLOPT_URL => "http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz1h126tr51cb_86zet&address=$newAddress&citystatezip=$zip",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array("cache-control: no-cache"),
        
    ));
    
    $jsonData = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    //echo ($jsonData);
    
    $xml = simplexml_load_string($jsonData);
    $json = json_encode($xml);
    
    echo ($json);
    
    //$array = json_decode($json,TRUE);
    
    //print_r($array);

?>