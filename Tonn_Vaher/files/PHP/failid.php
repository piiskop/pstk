<?php
require_once 'data.php';

require_once 'HTML/Template/IT.php';
$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../HTML');

$tpl->loadTemplatefile('header.html');
$tpl->touchBlock('header');
$tpl->parse('header');
/*$tpl->setVariable (array(
		
		'ID' => $persons["ID"],
		'Name' => $persons["Name"],
		'Picture' => $persons["Picture"]
		
));*/
echo $tpl->GET('header');

function makeImage($persons) {
	
}

foreach ($persons as $person) {
	echo "ID " . $person["ID"]. "<br>Nimi " . $person["Name"]. "<br>Pilt ";
	if (!empty($person["Picture"])) {
		echo $person["Picture"]."<br>";
	}
	else 
		echo "pilt puudub<br>";
}
/*
?>

<table>
	<tr>
		<th>ID</th>
		<th>Nimi</th>
		<th>Pilt</th>
	</tr>
	<tr>
		<td>{ID}</td>
		<td>{Name}</td>
		<td><img href="{Picture}" /></td>
	</tr>	
</table>

<?php */
		require_once 'HTML/Template/IT.php';
		$tmpl = new \HTML_Template_IT(dirname(__FILE__) . '/../HTML');
		$tmpl->loadTemplatefile('footer.html');
		$tmpl->touchBlock('footer');
		$tmpl->parse('footer');
		echo $tmpl->get('footer');
?>