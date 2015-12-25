<?php
require_once dirname ( __FILE__ ) . '/../muu/settings.php';

/**
 * This function prints ot how much time ago
 */
function ago($time) {
	if (preg_match ( '/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time )) {
		$time = strtotime ( $time );
	}
	$m = time () - $time;
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
	foreach ( $t as $u => $s ) {
		if ($s <= $m) {
			$v = floor ( $m / $s );
			$o = "$v $u" . ($v == 1 ? '' : 's') . ' ago';
			break;
		}
	}
	return $o;
}

// /////////////////////////////////////////////////////////////
function _ago($tm, $rcs = 0) 

{
	$currentTime = time ();
	$dif = $currentTime - $tm;
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
	
	$sexondsInSecond = 1;
	$secondsInMinute = 60;
	$secondsInHour = $secondsInMinute * 60;
	$secondsInDay = $secondsInHour * 24;
	$secondsInWeek = $secondsInDay * 7;
	$secondsInMonth = $secondsInWeek * (4 + 1 / 3);
	$secondsInYear = $secondsInMonth * 12;
	$secondsInDecade = $secondsInYear * 10;
	
	$sizes = array (
			1,
			60,
			3600,
			86400,
			604800,
			2630880,
			31570560,
			315705600 
	);
	
	for($v = sizeof ( $sizes ) - 1; ($v >= 0) && (($no = $dif / $sizes [$v]) <= 1); $v --)
		;
	if ($v < 0)
		$v = 0;
	$_tm = $currentTime - ($dif % $sizes [$v]);
	
	$no = floor ( $no );
	if ($no != 1)
		$pds [$v] .= 's';
	$x = sprintf ( "%d %s ", $no, $pds [$v] );
	if (($rcs > 0) && ($v >= 1) && (($currentTime - $_tm) > 0))
		$x .= _ago ( $_tm, -- $rcs );
	return $x;
}
/**
 * This function creates a human-readable string with the time value and unit
 * 
 * @param int $parameters['time']
 *        	the time value
 * @param string $parameters['unit']
 *        	the unit
 * @return string the human-readable string
 */
function generatePartialString($parameters) {
	if ($parameters ['time'] > 1) {
		$suffix = 's';
	} else {
		$suffix = ' ';
	}
	return sprintf ( '%1$u%2$s%3$s', $parameters ['time'], ' ' . $parameters ['unit'], $suffix );
}

/**
 * This function finds the difference between two timestamps and constructs a
 * human-readable string for it.
 * 
 * @return string the human-readable string
 */
function findDifference($parameters) {
	if (isset ( $parameters ['timestampInPast'] )) {
		$timestampInPast = new DateTime ( $parameters ['timestampInPast'] );
	} else {
		$timestampInPast = new DateTime ();
	}
	if (isset ( $parameters ['timestampInFuture'] )) {
		$timestampInFuture = new DateTime ( $parameters ['timestampInFuture'] );
	} else {
		$timestampInFuture = new DateTime ();
	}
	$difference = $timestampInPast->diff ( $timestampInFuture );
	if ($timestampInFuture->getTimestamp () > $timestampInPast->getTimestamp ()) {
		$difference = $timestampInPast->diff ( $timestampInFuture );
	} else {
		$difference = $timestampInFuture->diff ( $timestampInPast );
	}
	$partsOfTime = array ();
	if ($difference->y > 0) {
		$partsOfTime [] = generatePartialString ( array (
				'time' => $difference->y,
				'unit' => 'year' 
		) );
	}
	if ($difference->m > 0) {
		$partsOfTime [] = generatePartialString ( array (
				'time' => $difference->m,
				'unit' => 'month' 
		) );
	}
	if ($difference->d > 0) {
		$partsOfTime [] = generatePartialString ( array (
				'time' => $difference->d,
				'unit' => 'day' 
		) );
	}
	if ($difference->h > 0) {
		$partsOfTime [] = generatePartialString ( array (
				'time' => $difference->h,
				'unit' => 'hour' 
		) );
	}
	if ($difference->i > 0) {
		$partsOfTime [] = generatePartialString ( array (
				'time' => $difference->i,
				'unit' => 'minute' 
		) );
	}
	if ($difference->s > 0) {
		$partsOfTime [] = generatePartialString ( array (
				'time' => $difference->s,
				'unit' => 'second' 
		) );
	}
	$humanReadableString = implode ( " ", $partsOfTime );
	return $humanReadableString;
}

$timeInPast = strtotime ( '1978-04-08 21:30:15' );
$timeInFuture = strtotime ( '2032-04-08 21:30:15' );
// @formatter:off

echo ' <br/>179: ', sprintf ( 'The incident has taken place %1$s.', ago ( strtotime ( $timeInPast ) ) ) // 1
;
echo ' <br/>182: ', sprintf ( 'The incident is going to take place %1$s.', ago ( strtotime ( $timeInFuture ) ) ) // 1
;
echo ' <br/>187: ', sprintf ( 'The incident has taken place %1$s.', _ago ( strtotime ( $timeInPast ), 0 ) ) // 1
;
echo '<br/>191: nullpunkt: ', date ( 'YmdHis', 0 );
echo '<br/>192: PHP lõpp: ', date ( 'YmdHis', PHP_INT_MAX );
echo '<br/>192: ', sprintf ( 'The incident is going to take place %1$s.', _ago ( strtotime ( $timeInFuture ), 1 ) ) // 1
;
echo '<br/> 197: ', sprintf ( 'The Difference between 2016-11-11 16:25:00 and now is %1$s', findDifference ( array (
		'timestampInPast' => '2015-10-11 16:25:00' 
) ) );
echo '<br/> 203 :', sprintf ( 'The difference between 2016-11-11 16:25:00 and now is %1$s', findDifference ( array (
		'timestampInFuture' => '2018-11-11 16:25:00' 
) ) );

$datetime1 = new DateTime ( '2009-10-14' );
$datetime2 = new DateTime ( '2009-10-13' );
$interval = $datetime2->diff ( $datetime1 );
echo ' <br/>213: ', $interval->invert;
echo ' <br/>214: ', \pstk\string::translate ( 'minute' );
// @formatter:on