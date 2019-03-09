<?php

//validates that username is not contained in the password

$username = $_GET['username'];
$password = $_GET['pwd'];

$pos = stripos($password, $username);

$data = array();

if ($pos === false) 
{
    $data["validPassword"] = false;
}
else
{
    $data["validPassword"] = true;
}

echo json_encode($data);



?>