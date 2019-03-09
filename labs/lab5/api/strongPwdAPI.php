<?php

$pwdLength = $_GET['length']; //gets length variable from the page

//echo "topS3cr3t!";

$lettersArray = range("a", "z");

//print_r($lettersArray);  // displays all elements in array

$password = "";

for ($i = 0; $i < $pwdLength; $i++) // for loop
{
    $randomIndex = rand(0,25); // generates random number from (including) 0 and 25

    $password .= $lettersArray[$randomIndex]; //appends the value from the array to the string password

}


$password[0] = rand(0,9); // sets first character of password to a random number from 0 to 9

$password = str_shuffle($password); //shuffles characters in password

//echo $password;



$data = array();
$data["suggestedPwd"] = $password;

echo json_encode($data);

?>