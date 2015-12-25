<!DOCTYPE html>
<html lang="en">
<head>
<title>Harjutused</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="info.css">
<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
	<?php
	date_default_timezone_set('Europe/Tallinn');
	?>
	<fieldset class="fieldset">
		<legend>Harjutus 1</legend>
		<ol>
			<li><?php echo date('d.m.Y H:i:s').'<br/>';?></li>
			<li><?php echo date('Ymd').'<br/>';?></li>
			<li><?php echo date('n').'<br/>';?></li>
			<li><?php echo date('j').'<br/>';?></li>
			<li><?php echo date('g:i');?></li>	
		</ol>
	</fieldset>
	<fieldset class="fieldset">
		<legend>Harjutus 2</legend>
		<ol>
			<li>Kas Teil on ühiseid "alaealisi" lapsi?"</li>
			<li><?php echo 'Kas Teil on ühiseid "alaealisi" lapsi?"'.'<br/>';?></li>
			<li><?php echo "Kas Teil on ühiseid 'alaealisi' lapsi?".'<br/>';?></li>
			<?php $sentence = 'Kas Teil on ühiseid "alaealisi" lapsi?';?>
			<li><?php echo $sentence;?></li>
		</ol>
	</fieldset>
	<fieldset class="fieldset">
		<legend>Harjutus 3, Talitlused 1-10</legend>
			<?php 
			// sõnade liitmine
			function message($first, $second, $third){
				$f = $first;
				$s = $f.' '.$second;
				$t = $s.$third; // $third = {$second}!;
				return $t;}
			echo message('Hello', 'world', '!').'<br/>';
			
			// fraasi pikkuse arvutamine
			function stringLength($string){
				$result = mb_strlen(trim($string), 'UTF-8');
				return $result;}		
			echo 'Fraasi "süütuse eeldamine" pikkus on: '.stringLength('Süütuse eeldamine.').' tähemärki.<br/>';
			
			// eriliste märkide asendamine
			echo htmlspecialchars('mysql databases -h localhost -u databases -p < database.sql', $flags=ENT_HTML5).'<br/>';
			
			// esimses sõna esitäht suuureks
			function firstUpper($string){
				$string = ucfirst($string);
				return $string;}
			echo firstUpper('phoneNumber').'<br/>';
			
			// kõikide sõnade esitähed suureks
			function allUpper($string) {
				$string = ucwords($string);
				return $string;}
			echo allUpper('tarmo dulinets').'<br/>';
			
			// eemaldab sulud ja jutumärgid
			function stripQuotesAndParenthesis($string){
				$string = trim($string, '"() ');
				return $string;}
			echo stripQuotesAndParenthesis('("In Transition 2.0")').'<br/>';

			// teisendab kõik tähed väiketähtedeks
			function lowerCase($string) {
				$string = mb_strtolower($string, 'UTF-8');
				return $string;}
			echo lowerCase('("In Transition 2.0")').'<br/>';

			// teisendab kõik tähed suurtähtedeks
			function upperCase($string){
				$string = mb_strtoupper($string, 'UTF-8');
				return $string;}
			echo upperCase('("In Transition 2.0")').'<br/>';

			// arvu süntaksi muutmine
			function alterFloat($float){
				$float = number_format($float, 1, ',', ' ');
				return $float;}
			echo alterFloat(2015.16);	
			
				
?>
	</fieldset>
	

</body>
</html>