<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Otsing</title>
	</head>
	<body>
		<!-- search results filtering -->
		<div id="filter">
			<h1>Otsingufiltrid</h1>
			<form>
				<label>Maakond</label>
				<select>
					<option>Harjumaa</option>
				</select>
				<br />
				<label>Linn/vald</label>
				<select>
					<option>Tallinn</option>
				</select>
				<br />
				<label>Spordiala</label>
				<select>
					<option>Korvpall</option>
				</select>
				<br />
				<label>Kuupäev</label>
				<input type="date">
				<br />
				<label>Alguskellaaeg</label>
				<input type="time">
				<br />
				<label>Lõppkellaaeg</label>
				<input type="time">
			</form>
	
			<input type="button" value="tühjenda väljad">
			<input type="button" value="otsi">
		</div>
		<!-- showing search results -->
		<div id="tulemused">
			<h1>Otsingutulemused (1)</h1>
			<table border="1">
				<thead>
					<tr>
						<th>asutus</th>
						<th>aadress</th>
						<th>väljak</th>
						<th>info</th>
						<th>kontakt</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Spordihall</td>
						<td>Kuuse 18, Tallinn, Harjumaa</td>
						<td>Suur saal</td>
						<td><input type="button" value="Loe lähemalt" onclick="#"></td>
						<td>
							<p>test@spordihall.ee</p>
							<p>+372 123 123 123</p>
						</td>
					</tr>
				</tbody>
			</table>
			<a href="#"> &lt;&lt; Eelmised</a>
			<a href="#">1</a> <a href="#">Järgmised &gt;&gt;</a>
		</div>
	</body>
</html>