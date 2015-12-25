<?php

$thumbnail = "thumbnail.jpg";

$varud = array(
		array(
				"nimetus" => "magu",
				"kirjeldus" => "on kalkunikujuline",
				"pilt" => "pilt1.jpg"							
			),
		array(
				"nimetus" => "maks",
				"kirjeldus" => "on pepus",
				"pilt" => "pilt2.jpg"
		),
		array(
				"nimetus" => "maasikas",
				"kirjeldus" => "on punane",
				"pilt" => "pilt3.jpg"
		)			
		);
	
function pildike($varud, $arv) {
	if (file_exists($varud[$arv]["pilt"])) {
		echo $varud[$arv]["pilt"];
	}
	else {
		echo "thumbnail.jpg";
	}
}
?>

<?php for ($arv = 0; $arv < count($varud); $arv = $arv + 1) :  ?>
<div>
	<p><?php echo $varud[$arv]["nimetus"]; ?></p>
	<p><?php echo $varud[$arv]["kirjeldus"]; ?></p>	
	<img src=<?php pildike($varud, $arv); ?> alt="katki" style="width:100px;height:100px">	
</div>
<?php endfor; ?>
