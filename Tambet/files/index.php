<?php
/**
 * Created on 27.02.2015
 *
 * @copyright Copyright &copy; 2015, Kalmer Piiskop <pandeero@gmail.com>
 */
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: Mon,26 Jul 1997 05:00:00 GMT');
echo 'Saingi esimese PHP-faili tööle!';

?>
Täna on
<?php 
$today = date('Y', time()) . date('m', time()) . date('d', time());
// We print out the date.
echo $today;

if (true)
{
	echo ' 20 ';
}

$variable = 1995;
echo 'Muutuja on ' . gettype($variable) . '.<br/>';
settype($variable, 'String');
echo 'Muutuja on ' . gettype($variable) . '.<br/>';
echo 'Kas muutuja on täisarv?' . is_int($variable);

$data = 'väljas';
function displayData()
{
	$data = 'sees';
	echo $data;
}
displayData();
echo $data;

function incrementStatic()
{
	static $static = 0;
	$static++;
	if ($static < 10)
	{
		incrementStatic();
	}
	else
	{
		echo ' 48: ', $static;
	}
}
incrementStatic();

define("NUMBER", 1995);
echo '<br/>' . NUMBER;

echo '<br/>' . chr(13) . 'jou';
?>
<br/>
<script language="PHP">
echo time();
</script>