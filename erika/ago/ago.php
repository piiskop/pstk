<?php
require_once dirname ( __FILE__ ) . '/a_settings.php';

//ago, _ago FUNKTSIOONID EI NÄITA JU ALGUSEST PEALE ÕIGET TULEMUST ???!!!
//ago, _ago FUNKTSIOONID EI NÄITA JU ALGUSEST PEALE ÕIGET TULEMUST ???!!! 
//ago, _ago FUNKTSIOONID EI NÄITA JU ALGUSEST PEALE ÕIGET TULEMUST ???!!!

//WHEN FUNKTSIOON parandatud selliselt, et vähemalt päevad/tunnid näitab enam-vähem õigesti, ülejäänut (minutid, sekundid) ei kuva !!!

/*
 * This function shows how much time ago something was (done)
 *
 * @param string $time the time in an eatable format for <code>strottime</code>
 * @return string How much time ago
 *
 *
 */
function ago($time) {
	if (preg_match ( '/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time )) // /d -> 0-9, nt 1978-2-3 5:8:9, u on seotud UTF-8 ga
{
		$time = strtotime ( $time ); //
	}
	$m = time () - $time; // time() praegune aeg sekundites
	$o = 'just now';
	$t = array (
			'year' => 31556926,
			'month' => 2629744,
			'week' => 604800,
			'day' => 86400,
			'hour' => 3600,
			'minute' => 60,
			'second' => 1 
	);
	foreach ( $t as $u => $s ) { // $u on year, month, week jne, $s ajutisse muutujasse
		if ($s <= $m) {
			$v = floor ( $m / $s ); // teeb arvu täisarvuks, nt 2
			$o = "$v $u" . ($v == 1 ? '' : 's') . ' ago'; // täisarv $u=päev, aasta jne ja siis kas lisatakse s lõppu või mitte(hour/hours)
			break;
		}
	}
	return $o;
}



/*
 * This function shows how much time ago something was (done)
 * @param int $tm
 * @param number $rcs number of units
 * @return string How much time ago
 *
 */
function _ago($tm, $rcs = 0) {
	$cur_tm = time ();
	$dif = $cur_tm - $tm;
	$pds = array (
			'second',
			'minute',
			'hour',
			'day',
			'week',
			'month',
			'year',
			'decade' 
	);
	$lngh = array (
			1,
			60,
			3600,
			86400,
			604800,
			2630880,
			31570560,
			315705600 
	);
	for ($v = sizeof($lngh) - 1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v --);
	if ($v < 0) $v = 0;
	$_tm = $cur_tm - ($dif % $lngh[$v]);
	
	$no = floor($no);
	if ($no != 1) $pds[$v] .= 's';
	$x = sprintf("%d %s ", $no, $pds[$v]);
	if (($rcs > 0) && ($v >= 1) && (($cur_tm - $_tm) > 0)) $x .= _ago($_tm, 
		-- $rcs);
	return $x;
}


/*
 * This function shows how much time ago something was (done)
 * @param int $parameters['timestamp'] time in seconds
 * @param number $parameters['numberOfUnits'] number of units
 * @return string How much time ago
 *
 */
function when($parameters) { // $parameters = ['timestamp'], ['numberOfUnits']
	$currentTime = time();
	
	if (preg_match ( '/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $parameters['timestamp'] )) // /d -> 0-9, nt 1978-2-3 5:8:9, u on seotud UTF-8 ga
	{
		$time = strtotime( $parameters['timestamp'] ); //konventeerib sekunditeks
	}
	else {
		$time =  $parameters['timestamp'];
	}

	if($currentTime > $time){
		$difference =  $currentTime - $time;
	} else {
		$difference = $time - $currentTime;
	}

	$units = array (
			'second',
			'minute',
			'hour',
			'day',
			'week',
			'month',
			'year',
			'decade'
	);
	
	$secondsInSecond = 1;
	$secondsInMinute = 60;
	$secondsInHour = $secondsInMinute*60;
	$secondsInDay = $secondsInHour*24;
	$secondsInWeek = $secondsInDay*7;
	$secondsInMonth = $secondsInWeek*(4+1/3);
	$secondsInYear = $secondsInMonth*12;
	$secondsInDecade = $secondsInYear*10;
	
	$sizes = array (				//$sizes = array (
			$secondsInSecond, 		//1, //sekund
			$secondsInMinute, 		//60, //minut
			$secondsInHour, 		// 60*60, //tund
			$secondsInDay,			//60*60*24, //päev
			$secondsInWeek, 		//60*60*24*7, //nädal
			$secondsInMonth,		//60*60*24*7*(4+1/3), //kuu
			$secondsInYear, 		//60*60*24*7*(4+1/3)*12, //aasta
			$secondsInDecade 		//60*60*24*7*(4+1/3)*12*10 //kümmend
	);

	for($positionInUnits = sizeof ( $sizes ) - 1; ($positionInUnits >= 0) && 
		(($amountOfTime = $difference / $sizes [$positionInUnits]) <= 1); $positionInUnits --); 
		if ($positionInUnits < 0)
			$positionInUnits = 0;
		$remainedTime = $currentTime - ($difference % $sizes [$positionInUnits]);
		$amountOfTime = floor ( $amountOfTime );
		if ($amountOfTime != 1) 
			$units [$positionInUnits] .= 's';
		$when = sprintf ( "%d %s ", $amountOfTime, $units [$positionInUnits] );
		if (($parameters['numberOfUnits'] == 0) && ($positionInUnits >= 1) && (($currentTime - $remainedTime) > 0))
		$when .= when ( $remainedTime);
		return $when;
}





 $timeInPast = strtotime ( '2015-11-12 11:11:00' );
 $timeInFuture = strtotime ( '2015-11-14 11:12:00' );

 echo ' <br/>', date ( 'Y-m-d H:i:s', PHP_INT_MAX );
 echo ' <br/>';
 echo ' <br/>';
 
//@formatter:off
echo ' <br/>', sprintf ( 'The incident has taken place %1$s ago', ago ( strtotime ( $timeInPast ) ) );
echo ' <br/>', sprintf ( 'The incident is going to take place %1$s', ago ( strtotime ( $timeInFuture ), 20 ) ) ;
echo ' <br/>';
// // ..................................................
echo ' <br/>', sprintf ( 'The incident has taken place %1$s ago', _ago ( strtotime ( $timeInPast ), 0 ) );
echo ' <br/>', sprintf ( 'The incident is going to take place in %1$s', _ago ( strtotime ( $timeInFuture ), 20 ) );
echo ' <br/>';




//SEE MINGIT MOODI TÖÖTAB
echo ' <br/>', sprintf ( 'The incident happened %1$s ago', 
		when(array(
				'numberOfUnits' => 20,
				'timestamp'=>'2015-11-12 11:11:00'
				
		)));
				
echo ' <br/>', sprintf ( 'The incident will happen in %1$s ',
		when(array(
				'numberOfUnits' => 20,
				'timestamp'=>'2017-11-14 11:12:00',
		)));
echo ' <br/>';		

//@formatter:on