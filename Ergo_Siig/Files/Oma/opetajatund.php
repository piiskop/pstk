<?php
?>
<meta charset="UTF-8">
<title>Õpilaste hinded</title>
	<pre>
		<?php print_r($modules);?>
	</pre>
<div class="container">
	<div class="filters">
		<h2>Õpilaste hinded</h2>
		<form method="post">
			<label for="subject">Aine:</label>
			<select name="subject" id="subject">
				<option selected> -- Vali aine -- </option>
				<option value="Matemaatika">Matemaatika</option>
				<option value="Füüsika">Füüsika</option>
				<option value="PHP">PHP</option>
				<option value="Matemaatika">Matemaatika</option>
				<option value="Füüsika">Füüsika</option>
				<option value="PHP">PHP</option>
				<option value="Matemaatika">Matemaatika</option>
				<option value="Füüsika">Füüsika</option>
				<option value="PHP">PHP</option>
			</select>
			<label for="group"> Grupp:</label>
			<select name="group" id="group">
				<option selected> -- Vali grupp -- </option>
				<option value="TA1">TA1</option>
				<option value="TA2">TA2</option>
				<option value="MM">MM</option>
				<option value="TA1">TA1</option>
				<option value="TA2">TA2</option>
				<option value="MM">MM</option>
			</select>
			<input type="submit" value="Otsi" class="search"> <span class="glyphicon glyphicon-search" />
		</form>
	</div>
	<table border="1">
		<th>Nimi</th>
		<th>Grupp</th>
		<th><a href="#">3.01</a></th>
		<th><a href="#">8.01</a></th>
		<th><a href="#">15.02</a></th>
		<th><a href="#">17.02</a></th>
		<th><a href="#">4.03</a></th>
		<th><a href="#">6.03</a></th>
		<th><a href="#">9.03</a></th>
		<th><a href="#">21.03</a></th>
		<th><a href="#">4.04</a></th>
		<th><a href="#">8.04</a></th>
		<th><a href="#">10.04</a></th>
		<th><a href="#">9.05</a></th>
		<th><a href="#">15.05</a></th>
		<th><a href="#">16.05</a></th>
		<th>Koondhinne</th>
		
		<tr>
			<td><a href="studentInfo.php">Tõnn Vaher</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
		<tr>
			<td><a href="#">Martin Blasen</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
		<tr>
			<td><a href="#">Tambet Song</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
		<tr>
			<td><a href="#">Toomas Kivimägi</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
		<tr>
			<td><a href="#">Taavi Rõivas</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
		<tr>
			<td><a href="#">Pille minev</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
		<tr>
			<td><a href="#">Triin Tulev</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
				<tr>
			<td><a href="#">Ivor Võllmets</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
				<tr>
			<td><a href="#">Andrus Lang</a></td>
			<td>TA2</td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">2</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">3</a></td>
			<td><a href="#">4</a></td>
			<td><a href="#">5</a></td>
			<td><a href="#">1</a></td>
			<td><a href="#">4</a></td>
		</tr>
	</table>
</div>