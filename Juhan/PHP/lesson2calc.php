<?php
$a=array(2,4,6,8,10);
$b=array(3,5,7,9,11);
$len=sizeof($a);

for($i=0;$i<$len;$i++){
$c[$i]=$a[$i]+$b[$i];	
}
var_dump($c);
?>