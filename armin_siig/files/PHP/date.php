<?php
// echo date ('d.m.Y H:i:s'), "<br>",
// date('omd');
// echo date ('H:i'); 
//$day_of_week = date ( 'N', strtotime ( 'Monday' ) ); /* 2.1 */
//echo $day_of_week;
//echo "<br>";
//echo date ( 'l' ); /* 2.2 */

?>
<div id="body">
	<table>
		<thead>
		</thead>
		<tbody>
			<tr>
				<form action="choose.php" method="post">
					<input type="radio" name="redAnswer" value="0">1<br> <input
						type="radio" name="redAnswer" value="1">2<br> <input
						type="radio" name="redAnswer" value="2">3<br> <input
						type="radio" name="redAnswer" value="3">4<br> <input
						type="radio" name="redAnswer" value="4">5<br> <input type="radio"
						name="redAnswer" value="5">6<br> <input type="radio"
						name="redAnswer" value="6">7<br>
						<input type="submit">
				</form>
			</tr>
		</tbody>
	</table>