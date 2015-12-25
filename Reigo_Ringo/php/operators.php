<DOCTYPE html>
<html>
	<head>	
	<meta charset='UTF-8' />
	</head>
	
	<body>
		<?php
		
		//---------------------------------------------
		echo 'siin ++$muutuja <br />';
		$arv1 = 10; 
		echo 'muutuja on $arv1=10, selle väärtus pärast 1 liitmist on: ' .++$arv1. '<br />';
		
		//---------------------------------------------
		
		echo '<br />';
	
		//---------------------------------------------
		echo 'siin --$muutuja <br />';
		$arv2 = 10; 
		echo 'muutuja on $arv2=10, selle väärtus pärast 1 lahutamist on: ' .--$arv2. '<br />';
		
		//---------------------------------------------	
	
		echo '<br />';
		
		//---------------------------------------------
		echo 'siin $muutuja++ <br />';
		$arv3 = 8; 
		echo 'muutuja on $arv3=8, selle väärtus on: ' .$arv3++. '<br />';
		echo 'nüüd pärast tehet on selle väärtus: ' .$arv3. '<br />';
		//---------------------------------------------	
	
		echo '<br />';		
		
		//---------------------------------------------
		echo 'siin $muutuja-- <br />';
		$arv4 = 8; 
		echo 'muutuja on $arv4=8, selle väärtus on: ' .$arv4--. '<br />';
		echo 'nüüd pärast tehet on selle väärtus: ' .$arv4. '<br />';	
		//---------------------------------------------	
	
		echo '<br />';		
		
		//---------------------------------------------
		echo 'siin väärtuse omistamine <br />';
		$a = 5; 
		$b = 4;
		echo 'muutujad on $a=5, $b=4 <br />';
		$a = $b;
		echo '$a = $b, nüüd on $a väärtus: ' .$a. '<br />';	
		//---------------------------------------------	
	
		echo '<br />';

		//---------------------------------------------
		echo 'siin liitmine <br />';
		$a = 8; 
		$b = 2;
		echo 'muutujad on $a=8, $b=2 <br />';
		$a = $a + $b;
		echo '$a = $a + $b, nüüd on $a väärtus: ' .$a. '<br />';
		//nüüd teisti kirjutatuna
		$a += $b;
		echo '$a += $b, nüüd on $a väärtus: ' .$a. '<br />';			
		//---------------------------------------------	
	
		echo '<br />';
		
		//---------------------------------------------
		echo 'siin lahutamine <br />';
		$a = 8; 
		$b = 2;
		echo 'muutujad on $a=8, $b=2 <br />';
		$a = $a - $b;
		echo '$a = $a - $b, nüüd on $a väärtus: ' .$a. '<br />';	
		//nüüd teisti kirjutatuna
		$a -= $b;
		echo '$a -= $b, nüüd on $a väärtus: ' .$a. '<br />';		
		//---------------------------------------------	
	
		echo '<br />';	
		
		//---------------------------------------------
		echo 'siin jäägiga jagamine <br />';
		$a = 11; 
		$b = 6;
		echo 'muutujad on $a=11, $b=6 <br />';
		$a = $a % $b;
		echo '$a = $a % $b, nüüd on $a väärtus: ' .$a. '<br />';	
		//nüüd teisti kirjutatuna
		$a %= $b;
		echo '$a %= $b, nüüd on $a väärtus: ' .$a. '<br />';		
		//---------------------------------------------	
	
		echo '<br />';			
	
		//---------------------------------------------
		echo 'siin korrutamine <br />';
		$a = 8; 
		$b = 2;
		echo 'muutujad on $a=8, $b=2 <br />';
		$a = $a * $b;
		echo '$a = $a * $b, nüüd on $a väärtus: ' .$a. '<br />';
		//nüüd teisti kirjutatuna
		$a *= $b;
		echo '$a *= $b, nüüd on $a väärtus: ' .$a. '<br />';			
		//---------------------------------------------	
	
		echo '<br />';	
	
		//---------------------------------------------
		echo 'siin jagamine <br />';
		$a = 8; 
		$b = 2;
		echo 'muutujad on $a=8, $b=2 <br />';
		$a = $a / $b;
		echo '$a = $a / $b, nüüd on $a väärtus: ' .$a. '<br />';
		//nüüd teisti kirjutatuna
		$a /= $b;
		echo '$a /= $b, nüüd on $a väärtus: ' .$a. '<br />';			
		//---------------------------------------------	
	
		echo '<br />';
	
		//---------------------------------------------
		echo 'siin == ja ===<br />';
		$a = 2; 
		$b = 2;
		if ( $a == $b ){
			echo 'muutujad on võrdsed <br />';
		};	
		$a = 2; 
		$b = '2';
		if ( $a == $b ){
			echo 'muutujad on võrdsed kuigi pole sama tüüpi<br />';
		};		
		$a = 2; 
		$b = '2';
		if ( $a === $b ){
			echo 'muutujad on sama tüüpi<br />';
		}
		elseif ( $a !== $b ){
			echo 'muutujad pole identsed <br />';
		};			
				
		//---------------------------------------------		

		echo '<br />';	
		
		//---------------------------------------------
		echo 'siin != <br />';
		$a = 3; 
		$b = 2;
		if ( $a != $b ){
			echo 'muutujad pole võrdsed <br />';
		};			
		//---------------------------------------------			

		echo '<br />';			
		
		//---------------------------------------------
		echo 'siin && <br />';
		$a = 2; 
		$b = 5;
		if ( $a > 0 && $b == 5 ){
			echo 'seenemets <br />';
		};				
		//---------------------------------------------		

		echo '<br />';			

		//---------------------------------------------
		echo 'siin || <br />';
		$a = 2; 
		$b = 5;
		$c = 3;
		if ( $a == 0 || $b == 5 || $c == 2){
			echo 'vihmamets <br />';
		};				
		//---------------------------------------------		

		echo '<br />';	
		//---------------------------------------------
		echo 'mida ? teeb <br />';		
		echo "(tingimus ? 'tagastab selle kui õige' : 'selle kui vale') <br />";
		$c = 2; 
		$d = 5;
		echo 'muutujad on $c=2, $d=5. Kas nad on võrdsed: ' . ($c == $d ? 'jah' : 'ei');			
		//---------------------------------------------					
		?> 

	</body>
</html>
