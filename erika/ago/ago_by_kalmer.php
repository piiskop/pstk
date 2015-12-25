<?php
require_once dirname(__FILE__) . '/a_settings.php';

/**
 * This function prints out how much time ago.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @param string $time
 *        	the time in an eatable format for <code>strtotime</code>
 * @return string How much time ago?
 */
function ago($time)
{
	echo ' <br/>18: minu antud aeg: ', $time, ', praegune aeg: ', time();
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time)) 
	// 1978-2-3 5:8:9
	{
		$time = strtotime($time);
	}
	$m = time() - $time;
	$o = 'just now';
	$t = array(
		'year' => 31556926,
		'month' => 2629744,
		'week' => 604800,
		'day' => 86400,
		'hour' => 3600,
		'minute' => 60,
		'second' => 1
	);
	foreach ($t as $u => $s) {
		if ($s <= $m) {
			$v = floor($m / $s);
			$o = "$v $u" . ($v == 1 ? '' : 's') . ' ago';
			break;
		}
	}
	return $o;
}

/**
 * This function constructs a string to tell how much time ago.
 *
 * @author kalmer:piiskop <pandeero@gmail.com.
 * @param int $tm
 *        	time in seconds
 * @param number $rcs
 *        	number of units
 * @return string How much time ago?
 */
function _ago($tm, $rcs = 0)
{
	$cur_tm = time();
	$dif = $cur_tm - $tm;
	$pds = array(
		'second',
		'minute',
		'hour',
		'day',
		'week',
		'month',
		'year',
		'decade'
	);
	$lngh = array(
		1,
		60,
		3600,
		86400,
		604800,
		2630880,
		31570560,
		315705600
	);
	for ($v = sizeof($lngh) - 1; ($v >= 0) && 
	(($no = $dif / $lngh[$v]) <= 1); $v --);
	
	if ($v < 0) $v = 0;
	$_tm = $cur_tm - ($dif % $lngh[$v]);
	
	$no = floor($no);
	if ($no != 1) $pds[$v] .= 's';
	
	$x = sprintf("%d %s ", $no, $pds[$v]);
	
	if (($rcs > 0) && ($v >= 1) && (($cur_tm - $_tm) > 0)) $x .= _ago($_tm, 
		-- $rcs);
	return $x;
}

/**
 * This function creates a human-readable string with the time value and unit.
 *
 * @author kalmer:piiskop<pandeero@gmail.com>
 * @param int $parameters['time']
 *        	the time value
 * @param string $parameters['unit']
 *        	the unit
 * @return string the human-readable string
 */
function generatePartialString($parameters)
{
	if ($parameters['time'] > 1) {
		$suffix = 's';
	}
	else {
		$suffix = '';
	}
	// @formatter:off
	return sprintf(
		'%1$u%2$s%3$s',
		$parameters['time'], // 1
		' ' .$parameters['unit'], // 2
		$suffix // 3
	);
	// @formatter:on
}
/**
 * This function finds the difference between two timestamps and constructs a
 * human-readable string for it.
 *
 * @author kalmer:piiskop <pandeero@gmail.com.
 * @param string $parameters['timestampInPast']
 *        	the timestamp in the past in the format
 *        	<code>/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u</code>
 * @param string $parameters['timestampInFuture']
 *        	the timestamp in the future in the format
 *        	<code>/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u</code>
 * @param string $parameters['language']
 *        	the language code
 * @return string the human-readable string
 */
function findDifference($parameters)
{
	if (isset($parameters['timestampInPast'])) {
		$timestampInPast = new DateTime($parameters['timestampInPast']);
	}
	else {
		$timestampInPast = new DateTime();
	}
	if (isset($parameters['timestampInFuture'])) {
		$timestampInFuture = new DateTime($parameters['timestampInFuture']);
	}
	else {
		$timestampInFuture = new DateTime();
	}
	$difference = $timestampInPast->diff($timestampInFuture);
	if ($timestampInFuture->getTimestamp() > $timestampInPast->getTimestamp()) {
		$difference = $timestampInPast->diff($timestampInFuture);
	}
	else {
		$difference = $timestampInFuture->diff($timestampInPast);
	}
	$partsOfTime = array();
	// @formatter:off
	if ($difference->y > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->y,
			'unit' => 'year'
		));
	}
	if ($difference->m > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->m,
			'unit' => 'month'
		));
	}
	if ($difference->d > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->d,
			'unit' => 'day'
		));
	}
	if ($difference->h > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->h,
			'unit' => 'hour'
		));
	}
	if ($difference->i > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->i,
			'unit' => 'minute'
		));
	}
	if ($difference->s > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->s,
			'unit' => 'second'
		));
	}
	// @formatter:on
	$humanReadableString = implode(" ", $partsOfTime);
	return $humanReadableString;
}
$_SESSION['language'] = 'et_EE';

$timeInPast = strtotime('2016-2-3 5:8:9');
echo ' <br/>85: ', $timeInPast;
$timeInFuture = strtotime('2032-04-08 21:30:15');
// @formatter:off
echo ' <br/>38: ', sprintf(
	'The incident has taken place %1$s.',
	ago(strtotime($timeInPast)) // 1
);
echo ' <br/>85: ', sprintf(
	'The incident is going to take place %1$s.',
	ago(strtotime($timeInFuture)) // 1
);
echo ' <br/>89: ', sprintf(
	'The incident has taken place %1$s.',
	_ago(strtotime($timeInPast), 0) // 1
);
echo ' <br/>100: nullpnkt: ', date('YmdHis', 0);
echo ' <br/>100: PHP lõpp: ', date('YmdHis', PHP_INT_MAX);
echo ' <br/>93: ', sprintf(
	'The incident is going to take place %1$s.',
	_ago(strtotime($timeInFuture), 20) // 1
);
echo ' <br/>155: ', sprintf(
	'The difference between 2015-11-11 16:25:00 and now is %1$s.',
	findDifference(array (
		'timestampInPast' => '2015-10-11 16:25:00'
	)) // 1
);
echo ' <br/>197: ', sprintf(
	'The difference between 2016-11-11 16:25:00 and now is %1$s.',
	findDifference(array (
		'timestampInFuture' => '2018-11-11 16:25:00'
	)) // 1
);
$datetime1 = new DateTime('2009-10-14');
$datetime2 = new DateTime('2009-10-13');
$interval = $datetime2->diff($datetime1);
echo ' <br/>207: ', $interval->invert;
echo ' <br/>231: ', \pstk\String::translate('second');
// @formatter:on