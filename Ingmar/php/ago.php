<?php
require_once dirname(__FILE__) . '/settings.php';

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

/**
 * This function creates a human-readable string with the time value and unit.
 *
 * @author kalmer:piiskop<pandeero@gmail.com>
 * @param int $parameters['time']
 *        	the time value
 * @param string $parameters['unitInSingular']
 *        	the unit in singular
 * @param string $parameters['unitInPlural']
 *        	the unit in plural
 * @return string the human-readable string
 */
function generatePartialString($parameters)
{
// 	echo ' <br/>101: ', $parameters['time'];
	// @formatter:off
	if ($parameters['time'] > 1) {
		return sprintf(
			'%1$u&#160%2$s',
			$parameters['time'], // 1
			$parameters['unitInPlural'] // 2
		);
	}
	else {
		return sprintf(
			'%1$u&#160%2$s',
			$parameters['time'], // 1
			$parameters['unitInSingular'] // 2
		);
	}
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
			'unitInSingular' => \pstk\String::translate('year'),
			'unitInPlural' => \pstk\String::translate('years')
		));
	}
	if ($difference->m > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->m,
			'unitInSingular' => \pstk\String::translate('month'),
			'unitInPlural' => \pstk\String::translate('months')
		));
	}
	if ($difference->d > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->d,
			'unitInSingular' => \pstk\String::translate('day'),
			'unitInPlural' => \pstk\String::translate('days')
		));
	}
	if ($difference->h > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->h,
			'unitInSingular' => \pstk\String::translate('hour'),
			'unitInPlural' => \pstk\String::translate('hours')
		));
	}
	if ($difference->i > 0) {
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->i,
			'unitInSingular' => \pstk\String::translate('minute'),
			'unitInPlural' => \pstk\String::translate('minutes')
		));
	}
	if ($difference->s > 0) {
		echo ' 193 ';
		$partsOfTime[] = generatePartialString(array (
			'time' => $difference->s,
			'unitInSingular' => \pstk\String::translate('second'),
			'unitInPlural' => \pstk\String::translate('seconds')
		));
	}
	// @formatter:on
	$humanReadableString = implode(" ", $partsOfTime);
// 	echo ' <br/>201: ', $humanReadableString;
	return $humanReadableString;
}
$_SESSION['language'] = 'et_EE';

$timeInPast = strtotime('2016-2-3 5:8:9');
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
echo ' <br/>222: PHP algus: ', date('YmdHis', -PHP_INT_MAX);
echo ' <br/>223: PHP algus: ', date('YmdHis', PHP_INT_MAX + PHP_INT_MAX);
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
	'The difference is %1$s.',
	findDifference(array (
	)) // 1
);
echo ' <br/>237: ', (-4 == true);
// @formatter:on