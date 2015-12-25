<!DOCTYPE html>
<html>
<head>
<title>Summator</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>
<head>
<body>
<form method="post" action="">
<input type="number" step="0.1" id="value1" name="value1"> 
<input type="number" step="0.1" id="value2" name="value2"><br>
<button type="submit" name="calc" id="add" value="add">+</button><br>
<button type="submit" name="calc" id="subtract" value="subtract">-</button><br>
<button type="submit" name="calc" id="multiply" value="multiply">*</button><br>
<button type="submit" name="calc" id="divide" value="divide">/</button><br>
<p>
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
</p>
</form>
</body>
</head>
</html>