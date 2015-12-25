<?php
$k=0;

$Numbrid = array(
		0 => 14,
		1 => 4,
		2 => 6,
		3 => 8,
		4 => 11,
		5 => 29,
		6 => 34,
		7 => 6,
		8 => 8,
		9 => 15,
);
//FOR loop
echo "FOR LOOP : ";
$h = 0;
for($m=0; $m<10;$m++)
{	
	$h ++;
	if($h==2)
	{
		echo $Numbrid[$m], " ";
		$h=0;
	}
}
echo "<br><br>";
$m = 0;
//WHILE loop
echo "WHILE LOOP : ";
$h = 0;
while ($m < 10)
	{
		$h++;
		if($h==2)
		{
			echo $Numbrid[$m], " "  ;
			$h= 0;
		}
	$m ++;
	}
echo "<br><br>";
$m=0;
//WHILE DO loop
echo "WHILEDO LOOP: ";
do 
{
	$h ++;
	if($h==2)
	{
		echo $Numbrid[$m], " ";
		$h= 0;
	}
	$m ++;
}while($m < 10);
echo "<br><br>";
//FOREACH LOOP
echo "FOREACH LOOP: ";
$m=3;
foreach ($Numbrid as $s)
{
	$h ++;
	if($h==2)
	{
		echo $s, " ";
		$h= 0;
	}
	$m ++;
	
}


