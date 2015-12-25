<?php
$a="(\"In Transition 2.0\")";
$d=2015.16;
echo $a;
echo "<br>";
echo trim($a,"(\"\")")."<br>"; 
echo mb_strtolower($a)."<br>";
echo mb_strtoupper($a)."<br>";
echo number_format($d,1, ".", " ");
?>