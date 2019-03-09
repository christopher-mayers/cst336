<?php

//echo $_GET['username']; just testing lul

$usernames = array("eeny", "meeny", "miny", "maria", "john");

//$usernames[] = ;

//array_push($usernames, );

//print_r($usernames);

if(in_array(strtolower($_GET['username']), $usernames))
{
    echo "Not available!";
    
}
else
{
    echo "Available!";
}

?>