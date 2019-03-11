<?php

$halfCodes = array("halfPrice", "getFifty");
$thirtyCodes = array("sand30", "spring30");
$twentyCodes = array("beach", "sunny");

$promoCode = $_GET['promoCode'];


if (in_array( $promoCode, $halfCodes))
{
    echo(0.5);
}
else if (in_array( $promoCode, $thirtyCodes))
{
    echo(0.3);
}
else if (in_array($promoCode, $twentyCodes))
{
    echo(0.2);
}
else
{
    echo(0);
}
?>