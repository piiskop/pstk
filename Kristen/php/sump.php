<?php
$value1=$_POST["value1"];
$value2=$_POST["value2"];
$operator = $_POST["calc"];
$add=$value1+$value2;
$subtract=$value1-$value2;
$multiply=$value1*$value2;
$divide=$value1/$value2;

switch($operator)
{
    case "add":
    echo "$value1 + $value2 = ".$add;
    break; 
    case "subtract":
    echo "$value1 - $value2 = ".$subtract;
    break;
    case "multiply":
    echo "$value1 * $value2 = ".$multiply;
    break; 
    case "divide":
    echo "$value1 / $value2 = ".$divide;
    break;
}
?>