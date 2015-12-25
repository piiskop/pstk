<?php
require_once dirname(__FILE__) . '/settings.php';

function timestamp($time, $language)
{
	if (preg_match('/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u', $time)) {
		$time = strtotime($time);
	}
	$m = abs(time() - $time);
	$o = 'just now';
	$n = 'just nüüd';
	$t = array(
		array(
			'aasta' => 31556926,
			'kuu' => 2629744,
			'nädal' => 604800,
			'päev' => 86400,
			'tund' => 3600,
			'minut' => 60,
			'sekund' => 1
		),
		array(
			'year' => 31556926,
			'month' => 2629744,
			'week' => 604800,
			'day' => 86400,
			'hour' => 3600,
			'minute' => 60,
			'second' => 1
		)
	);
	if ($language === 'english') {
		foreach ($t[1] as $u => $s) {
			if ($s <= $m) {
				$v = floor($m / $s);
				$o = "$v $u" . ($v == 1 ? '' : 's') . ' ago';
			}
			elseif ($s > $m) {
				$v = floor($m / $s);
				$o = "$v $u" . ($v == 1 ? '' : 's') . ' time';
			}
			break;
		}
		return $o;
	}
	elseif ($language === 'estonian') {
		foreach ($t[0] as $u => $s) {
			if ($s <= $m) {
				switch($u) {
					case 'sekund':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : 'i') . ' eest';
						break;
					case 'minut':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : 'i') . ' eest';
						break;
					case 'tund':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : 'ni') . ' eest';
						break;
					case 'päev':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : 'a') . ' eest';
						break;
					case 'nädal':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : 'a') . ' eest';
						break;
					case 'kuu':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : '') . ' eest';
						break;
					case 'aasta':
						$v = floor($m / $s);
						$o = "$v $u" . ($v == 1 ? '' : '') . ' eest';
						break;
				}
			}
			elseif ($s > $m) {
				switch($u) {
					case 'sekund':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : 'i') . ' pärast';
						break;
					case 'minut':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : 'i') . ' pärast';
						break;
					case 'tund':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : 'ni') . ' pärast';
						break;
					case 'päev':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : 'a') . ' pärast';
						break;
					case 'nädal':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : 'a') . ' pärast';
						break;
					case 'kuu':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : '') . ' pärast';
						break;
					case 'aasta':
						$v = floor($m / $s);
						$n = "$v $u" . ($v == 1 ? '' : '') . ' pärast';
						break;
				}
			}
		}
		return $n;
	}
// 	if ($language === 'english') {
// 		return $o;
// 	}
// 	elseif ($language === 'estonian') {
// 		return $n;
// 	}
}

$languageInFuture = 'english';
$languageInPast = 'estonian';
$timeInFuture = '2032-04-08 21:30:15';
$timeInPast = '1978-04-08 21:30:15';
// @formatter:off
echo ' <br/>126: ', sprintf(
	'The incident is going to take place in %1$s.',
	timestamp(strtotime($timeInFuture), $languageInFuture)
);
echo ' <br/>130: ', sprintf(
	'Intsident toimus %1$s.',
	timestamp(strtotime($timeInPast), $languageInPast)
);
// @formatter:on