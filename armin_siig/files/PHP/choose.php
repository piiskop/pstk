<?php
$cycle = array (
		0 => 'Monday',
		1 => 'Tuesday',
		2 => 'Wensday',
		3 => 'Thursday',
		4 => 'Friday',
		5 => 'Saturday',
		6 => 'Sunday' 
);
?>
<html>
<body>
Your pick is <?php

echo $cycle [$_POST ['redAnswer']], '<br>';
if ($cycle [$_POST ['redAnswer']] = 'Monday')
	echo "Tomorrow will be " . $cycle [1], ". ", '<br/>', "Yesterday was " . $cycle [6], ".";

elseif ($cycle [$_POST ['redAnswer']] = 'Tuesday')
	echo "Tomorrow will be " . $cycle [2], ". ", '<br/>', "Yesterday was " . $cycle [0], ".";

elseif ($cycle [$_POST ['redAnswer']] = 'Wensday')
	echo "Tomorrow will be " . $cycle [3], ". ", '<br/>', "Yesterday was " . $cycle [1], ".";

elseif ($cycle [$_POST ['redAnswer']] = 'Thursday')
	echo "Tomorrow will be " . $cycle [4], ". ", '<br/>', "Yesterday was " . $cycle [2], ".";

elseif ($cycle [$_POST ['redAnswer']] = 'Friday')
	echo "Tomorrow will be " . $cycle [5], ". ", '<br/>', "Yesterday was " . $cycle [3], ".";

elseif ($cycle [$_POST ['redAnswer']] = 'Saturday')
	echo "Tomorrow will be " . $cycle [6], ". ", '<br/>', "Yesterday was " . $cycle [4], ".";

elseif ($cycle [$_POST ['redAnswer']] = 'Sunday')
	echo "Tomorrow will be " . $cycle [0], ". ", '<br/>', "Yesterday was " . $cycle [1], ".";

?>	

</body>
</html>