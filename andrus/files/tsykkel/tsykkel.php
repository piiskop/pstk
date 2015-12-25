<p><b>for1</b></p>
<?php
for($nr=1;$nr<=10;$nr++){
	echo $nr.'<br>';
}
?>
<p><b>for2</b></p>
<?php
$nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
for($nr=0;$nr<count($nimed);$nr++){
	echo $nimed[$nr].'<br>';  
}
?>
<p><b>while tsykkel</b></p>
<?php
	$arv = 1;
	while($arv <=10){
		echo $arv.'<br>'; 
		$arv++; 
	}
?>
<p><b>do while tsykkel</b></p>
<?php
	$number = 1;
	do{
		echo $number.'<br>'; 
		$number++;  
	} while($number <=10);
?>
<p><b>Tsykkel tsyklis</b></p>
<p>Naide1</p>
<?php
for($rida=1; $rida<=5; $rida++){ 
	echo '*<br>';
}
?>
<p>Naide2</p>
<?php 
for($rida=1; $rida<=5; $rida++){ 
	for($veerg=1; $veerg<=5; $veerg++){ 
			echo '*';   
		}
	echo '<br>';
}
?>
<p>Naide3</p>
<?php 
for($rida=1; $rida<=5; $rida++){
	for($veerg=1; $veerg<= $rida; $veerg++){
		echo '*';
	}
	echo '<br>';
}
?>
<p>Naide4</p>
<?php 
for($rida=1; $rida<=5; $rida++){
	for($veerg=5; $veerg>= $rida; $veerg--){
		echo '*';
	}
	echo '<br>';
}
?>
<p><b>tsykkel tingimuslausega</b></p>
<p>Naide1</p>
<?php 
for($nr=1;$nr<=10;$nr++){
	if($nr<=3){
		echo $nr.'<br>';
	}
}
?>
<p>Naide2</p>
<?php 
for($nr=1;$nr<=10;$nr++){
	if($nr>3){
		continue;
	}
	echo $nr.'<br>';
}
?>
<p>Naide3</p>
<?php
for($nr=1;$nr<=10;$nr++){
	if($nr>3){
		break;
	}
	echo $nr.'<br>';
}
?>
<p>Naide4</p>
<?php
$nimed = array(1=>'mari', 'kati', 'juhan', 'miku', 'uku');
$kokku = count($nimed);

for($nr=1;$nr<=$kokku;$nr++){
	if($nr<$kokku-2){
		continue;
	}
	echo $nimed[$nr].'<br>';
}
?>