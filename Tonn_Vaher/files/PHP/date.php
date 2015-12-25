<?php

if (isset($_POST["date"])) {
	$start = date_parse($_POST["start"]);
	$end = date_parse($_POST["end"]);
	$tulemus = "Aeg: ";
	if ($start["year"] != $end["year"]) {
		$tulemus .= $start["year"]."-";
	}
	if ($start["month"] != $end["month"]) {
		$tulemus .= $start["month"]."-";
	}
	if ($start["day"] != $end["day"]) {
		$tulemus .= $start["day"]."-";
	}
	echo $tulemus;
	//print_r ($start);
	//echo date_diff($start,$end);
}

?>
<meta charset="UTF-8">
<body>
	<form method="post">
		<div>
			<label for="start">Alates:</label>
			<input type="date" name="start" value="2005­02­26 07:30:00">
		</div>
		<div>
			<label for="end">Kuni:</label>
			<input type="date" name="end" value="2005­12­03 08:40:00">
		</div>
			<input type="submit" name="date">
	</form>
</body>