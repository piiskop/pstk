<?php
$events = array(
	array
	(
		'name'	=> 'First event',
		'start' => '2005-02-26 07:30:00',
		'end'	=> '2009-02-26 07:30:00',
	),
	array
	(
		"name"	=> "Second event",
		"start" => '2005-02-26 07:30:00',
		"end"	=> '2005-03-27 07:30:00',
	),
	array
	(
		"name"	=> "Third event",
		"start" => "2005-02-26 07:30:00",
		"end"	=> "2005-02-26 07:15:00",
	)
);

function length_from_to($start, $end)
{	
	if(gmdate('Y',$start)!=(gmdate('Y',$end)))
	{	// Different year
		echo gmdate('d.m.Y', $start)." - ".gmdate('d.m.Y', $end);
	}
	else
	{
		if(gmdate('m',$start)!=(gmdate('m',$end)))
		{	//Different month
			echo gmdate('d.m.', $start)." - ".gmdate('d.m.Y', $end);
		}
		else 
		{
			if(gmdate('m',$start)!=(gmdate('m',$end)))
			{	//Different day
				echo gmdate('d.', $start)." - ".gmdate('d.m.Y', $end);
			}
			else
			{
				if(gmdate('G',$start)!=(gmdate('G',$end)))
				{	//Different hour
					echo gmdate('d.m.Y G:i', $start)." - ".gmdate('G:i', $end);
				}
				else
				{	
					if(gmdate('i',$start)!=(gmdate('i',$end)))
					{	//Different minute
						echo gmdate('i:s', $start)." - ".gmdate('Y.m.d G:i:s', $end);
					}
					else
					{
						echo "Please enter different times.";
					}
				}
			}
		}
	}
}
?>
<html>
	<head>
		<title></title>
		<LINK href="css.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="header"><div id="header_text">List of events</div></div></div>
		<div id="body">
			<?php 
			for ($i=0;$i<count($events);$i++)
			{
				echo "<div class='event'>";
				echo "<div class='event_name'>".$events[$i]['name']."</div>";
				
				length_from_to(strtotime($events[$i]['start']), strtotime($events[$i]['end']));
				echo "</div>";
				echo "<br>";
			}
			?>
		</div>
	</body>
</html>