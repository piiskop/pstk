<?php
require_once dirname(__FILE__) . '/../php/settings.php';
require_once dirname(__FILE__) . '/timestamp.html';

echo '<br/>' . $_GET['language'];

function getLangElement($lang,$element,$timeCount) {
	//Lausetüved
	if ($element == 'timePast') {
		if ($lang == 'ET') { return 'See sündmus toimus %1$s tagasi.';}
		elseif ($lang == 'EN') { return 'The incident took place %1$s ago.'; }
		elseif ($lang == 'RU') { return 'RU_placeholder: %1$s'; }
		else { return '12: Error; Invalid Language'; }
	}
	elseif ($element == 'timeFuture') {
		if ($lang == 'ET') { return 'See sündmus toimub %1$s pärast.';}
		elseif ($lang == 'EN') { return 'The incident is going to take place in %1$s.'; }
		elseif ($lang == 'RU') { return 'RU_placeholder: %1$s'; }
		else { return '18: Error; Invalid Language'; }
	}
	elseif ($element == 'timeBetween') {
		if ($lang == 'ET') { return 'Nendel kahel sündmusel on %1$s vahet.';}
		elseif ($lang == 'EN') { return 'The two incidents are %1$s apart.'; }
		elseif ($lang == 'RU') { return 'RU_placeholder: %1$s'; }
		else { return '24: Error; Invalid Language'; }
	}
	//Nullaeg, "Just Now"
	elseif ($element == 'zeroTime') {
		if ($lang == 'ET') { return 'just nüüd';}
		elseif ($lang == 'EN') { return 'just now'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '32: Error; Invalid Language'; }
	}
	//Aasta sõned, minevik
	elseif ($element == 'yearPast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' aasta'; }
		elseif ($lang == 'EN') { return $timeCount.' year'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '39: Error; Invalid Language'; }
	}
	elseif ($element == 'yearPast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'yearPast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'yearPast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang = 'ET') { return $timeCount.' aastat';}
		elseif ($lang = 'EN') { return $timeCount.' years';}
		else { return '46: Error; Invalid Language';}
	}
	//Kuu sõned, minevik
	elseif ($element == 'monthPast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' kuu'; }
		elseif ($lang == 'EN') { return $timeCount.' month'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '53: Error; Invalid Language'; }
	}
	elseif ($element == 'monthPast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'monthPast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'monthPast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' kuud';}
		elseif ($lang == 'EN') { return $timeCount.' months';}
		else { return '60: Error; Invalid Language';}
	}
	//Nädala sõned, minevik
	elseif ($element == 'weekPast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' nädal'; }
		elseif ($lang == 'EN') { return $timeCount.' week'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '67: Error; Invalid Language'; }
	}
	elseif ($element == 'weekPast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'weekPast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'weekPast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' nädalat';}
		elseif ($lang == 'EN') { return $timeCount.' weeks';}
		else { return '74: Error; Invalid Language';}
	}
	//Päeva sõned, minevik
	elseif ($element == 'dayPast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' päev';}
		elseif ($lang == 'EN') { return $timeCount.' day';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '81: Error; Invalid Language'; }
	}
	elseif ($element == 'dayPast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'dayPast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'dayPast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' päeva';}
		elseif ($lang == 'EN') { return $timeCount.' days';}
		else { return '90: Error; Invalid Language';}
	}
	//Tunni sõned, minevik
	elseif ($element == 'hourPast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' tund';}
		elseif ($lang == 'EN') { return $timeCount.' hour';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '97: Error; Invalid Language'; }
	}
	elseif ($element == 'hourPast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'hourPast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'hourPast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' tundi';}
		elseif ($lang == 'EN') { return $timeCount.' hours';}
		else { return '106: Error; Invalid Language';}
	}
	//Minuti sõned, minevik
	elseif ($element == 'minutePast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' minut';}
		elseif ($lang == 'EN') { return $timeCount.' minute';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '113: Error; Invalid Language'; }
	}
	elseif ($element == 'minutePast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'minutePast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'minutePast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' minutit';}
		elseif ($lang == 'EN') { return $timeCount.' minutes';}
		else { return '122: Error; Invalid Language';}
	}
	//Sekundi sõned, minevik
	elseif ($element == 'secondPast' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' sekund';}
		elseif ($lang == 'EN') { return $timeCount.' second';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '129: Error; Invalid Language'; }
	}
	elseif ($element == 'secondPast' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'secondPast' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'secondPast' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' sekundit';}
		elseif ($lang == 'EN') { return $timeCount.' seconds';}
		else { return '138: Error; Invalid Language';}
	}
	//Tuleviku Sõned
	//Aasta sõned, tulevik
	elseif ($element == 'yearFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' aasta'; }
		elseif ($lang == 'EN') { return $timeCount.' year'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '146: Error; Invalid Language'; }
	}
	elseif ($element == 'yearFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'yearFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'yearFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' aasta';}
		elseif ($lang == 'EN') { return $timeCount.' years';}
		else { return '153: Error; Invalid Language';}
	}
	//Kuu sõned, tulevik
	elseif ($element == 'monthFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' kuu'; }
		elseif ($lang == 'EN') { return $timeCount.' month'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '160: Error; Invalid Language'; }
	}
	elseif ($element == 'monthFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'monthFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'monthFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' kuu';}
		elseif ($lang == 'EN') { return $timeCount.' months';}
		else { return '167: Error; Invalid Language';}
	}
	//Nädala sõned, tulevik
	elseif ($element == 'weekFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' nädala'; }
		elseif ($lang == 'EN') { return $timeCount.' week'; }
		elseif ($lang == 'RU') { return 'RU_placeholder'; }
		else { return '174: Error; Invalid Language'; }
	}
	elseif ($element == 'weekFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') { return 'RU_placeholder'; }
	elseif ($element == 'weekFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'weekFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' nädala';}
		elseif ($lang == 'EN') { return $timeCount.' weeks';}
		else { return '181: Error; Invalid Language';}
	}
	//Päeva sõned, tulevik
	elseif ($element == 'dayFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' päeva';}
		elseif ($lang == 'EN') { return $timeCount.' day';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '188: Error; Invalid Language'; }
	}
	elseif ($element == 'dayFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'dayFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'dayFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' päeva';}
		elseif ($lang == 'EN') { return $timeCount.' days';}
		else { return '197: Error; Invalid Language';}
	}
	//Tunni sõned, tulevik
	elseif ($element == 'hourFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' tunni';}
		elseif ($lang == 'EN') { return $timeCount.' hour';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '204: Error; Invalid Language'; }
	}
	elseif ($element == 'hourFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'hourFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'hourFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' tunni';}
		elseif ($lang == 'EN') { return $timeCount.' hours';}
		else { return '213: Error; Invalid Language';}
	}
	//Minuti sõned, tulevik
	elseif ($element == 'minuteFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' minuti';}
		elseif ($lang == 'EN') { return $timeCount.' minutes';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '220: Error; Invalid Language'; }
	}
	elseif ($element == 'minuteFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'minuteFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'minuteFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' minuti';}
		elseif ($lang == 'EN') { return $timeCount.' minutes';}
		else { return '229: Error; Invalid Language';}
	}
	//Sekundi sõned, tulevik
	elseif ($element == 'secondFuture' && $timeCount == 1) {
		if ($lang == 'ET') { return $timeCount.' sekundi';}
		elseif ($lang == 'EN') { return $timeCount.' second';}
		elseif ($lang == 'RU') { return 'RU_placeholder';}
		else { return '236: Error; Invalid Language'; }
	}
	elseif ($element == 'secondFuture' && $timeCount > 1 && $timeCount < 5 && $lang == 'RU') {
		return 'RU_placeholder';
	}
	elseif ($element == 'secondFuture' && $timeCount > 4 && $lang == 'RU') { return 'RU_placeholder';}
	elseif ($element == 'secondFuture' && $timeCount > 1 && $lang != 'RU') {
		if ($lang == 'ET') { return $timeCount.' sekundi';}
		elseif ($lang == 'EN') { return $timeCount.' seconds';}
		else { return '245: Error; Invalid Language';}
	}
}
function timestamp($time,$fromZero)
{
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time))
	{
		$time = strtotime($time);
	}
	$m = time() - $time; //Kui $time on ajahetk, mida võrreldakse praeguse hetkega
	if ($fromZero == true) { //Kui $time on ajavahemik getDifferenceOfTimes funktsioonist
		$m = abs($time);
	}
	$t = array( //Ajaperioodid, millega tehakse kontrolle ja töötlemistehteid
			'aasta' => 31556926,
			'kuu' => 2629744,
			'nädal' => 604800,
			'päev' => 86400,
			'tund' => 3600,
			'minut' => 60,
			'sekund' => 1
	);
	
	if ($m == 0) { return getLangElement($_GET['language'], 'zeroTime',0); } else;
	if (abs($m) >= $t['aasta']){ //Kui ajavahe on pikem kui aasta...
		if (floor($m/$t['aasta']) > 0) { //...kui on positiivne arv, võrreldakse minevikuga. 
			return getLangElement($_GET['language'],'yearPast',floor(abs($m/$t['aasta'])));
		}
		elseif (floor($m/$t['aasta']) < 0) { //...kui on negatiivne, võrreldakse tulevikuga.
			return getLangElement($_GET['language'],'yearFuture',floor(abs($m/$t['aasta'])));
		}
	} 
	elseif (abs($m) >= $t['kuu']){ //Vahemik vähem kui aasta, võrreldakse kuu pikkusega.
		if (floor($m/$t['kuu']) > 0) { 
			return getLangElement($_GET['language'],'monthPast',floor(abs($m/$t['kuu'])));
		}
		elseif (floor($m/$t['kuu']) < 0) {
			return getLangElement($_GET['language'],'monthFuture',floor(abs($m/$t['kuu'])));
		}
	}
	elseif (abs($m) >= $t['nädal']){ //Vahemik vähem kui kuu, võrreldakse nädala pikkusega.
		if (floor($m/$t['nädal']) > 0) {
			return getLangElement($_GET['language'],'weekPast',floor(abs($m/$t['nädal'])));
		}
		elseif (floor($m/$t['nädal']) < 0) {
			return getLangElement($_GET['language'],'weekFuture',floor(abs($m/$t['nädal'])));
		}
	}
	elseif (abs($m) >= $t['päev']){ //Vahemik vähem kui nädal, võrreldakse päeva pikkusega.
		if (floor($m/$t['päev']) > 0) {
			return getLangElement($_GET['language'],'dayPast',floor(abs($m/$t['päev'])));
		}
		elseif (floor($m/$t['päev']) < 0) {
			return getLangElement($_GET['language'],'dayFuture',floor(abs($m/$t['päev'])));
		}
	}
	elseif (abs($m) >= $t['tund']){ //Vahemik vähem kui päev, võrreldakse tunni pikkusega.
		if (floor($m/$t['tund']) > 0) {
			return getLangElement($_GET['language'],'hourPast',floor(abs($m/$t['tund'])));
		}
		elseif (floor($m/$t['tund']) < 0) {
			return getLangElement($_GET['language'],'hourFuture',floor(abs($m/$t['tund'])));
		}
	}
	elseif (abs($m) >= $t['minut']){ //Vahemik vähem kui tund, võrreldakse minuti pikkusega.
		if (floor($m/$t['minut']) > 0) {
			return getLangElement($_GET['language'],'minutePast',floor(abs($m/$t['minut'])));
		}
		elseif (floor($m/$t['minut']) < 0) {
			return getLangElement($_GET['language'],'minuteFuture',floor(abs($m/$t['minut'])));
		}
	}
	elseif (abs($m) >= $t['sekund']){ //Vahemik vähem kui minut, võrreldakse sekundi pikkusega.
		if (floor($m/$t['sekund']) > 0) {
			return getLangElement($_GET['language'],'secondPast',floor(abs($m/$t['sekund'])));
		}
		elseif (floor($m/$t['sekund']) < 0) {
			return getLangElement($_GET['language'],'secondFuture',floor(abs($m/$t['sekund'])));
		}
	}
	else { return '327: Error'; } //Veateade. Kood ei tohiks siia jõuda muidu, kui väliste mõjutuste jõul.
}
function getDifferenceOfTimes($timeA,$timeB) {
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $timeA))
	{
		$timeA = strtotime($timeA);
	}
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $timeB))
	{
		$timeB = strtotime($timeB);
	}
	$d = $timeA-$timeB;
	return timestamp($d,true); 
}

$timeInPast = strtotime('1978-04-08 21:30:15');
$timeInFuture = strtotime('2032-04-08 21:30:15');
// @formatter:off
echo ' <br/>345: ', sprintf(
	getLangElement($_GET['language'],'timePast',0),
	timestamp($timeInPast,false)
);
echo ' <br/>249: ', sprintf(
	getLangElement($_GET['language'],'timeFuture',0),
	timestamp($timeInFuture,false)
);
echo ' <br/>253: ', sprintf(
	getLangElement($_GET['language'],'timeBetween',0),
	getDifferenceOfTimes($timeInPast,$timeInFuture)
);

echo '<br/>' . date('YmdHis',PHP_INT_MAX);
// @formatter:on
