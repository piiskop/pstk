<?php
$darv=array(array("nimi"=>"Põhja-Tallinn","koht"=>57,"voitja"=>""),
		array("nimi"=>"Nõmme","koht"=>30,"voitja"=>""),array("nimi"=>"Mustamäe","koht"=>39,"voitja"=>"Savisaar"),
		array("nimi"=>"Kesklinn","koht"=>42,"voitja"=>""),array("nimi"=>"Lasnamäe","koht"=>87,"voitja"=>"Savisaar"),array("nimi"=>"Kriistine","koht"=>27,"voitja"=>""),array("nimi"=>"Pirita","koht"=>16,"voitja"=>"Savisaar"),
array("nimi"=>"Harjumaa","koht"=>68,"voitja"=>""),array("nimi"=>"Raplamaa","koht"=>20,"voitja"=>"simson"),array("nimi"=>"Pärnu","koht"=>28,"voitja"=>""),array("nimi"=>"Pärnumaa","koht"=>27,"voitja"=>""),
array("nimi"=>"Läänemaa","koht"=>20,"voitja"=>""),array("nimi"=>"Hiiumaa","koht"=>2,"voitja"=>""),array("nimi"=>"Saaremaa","koht"=>21,"voitja"=>""),array("nimi"=>"Viljandimaa","koht"=>27,"voitja"=>""),
array("nimi"=>"Järvamaa","koht"=>26,"voitja"=>""),array("nimi"=>"Lääne-Viru","koht"=>53,"voitja"=>""),array("nimi"=>"Ida-Viru","koht"=>38,"voitja"=>""),array("nimi"=>"K-Järve","koht"=>30,"voitja"=>"m"),
array("nimi"=>"Narva","koht"=>32,"voitja"=>"simson"),array("nimi"=>"Jõgevamaa","koht"=>58,"voitja"=>""),array("nimi"=>"Tartu","koht"=>38,"voitja"=>""),array("nimi"=>"Tartumaa","koht"=>34,"voitja"=>""),
array("nimi"=>"Valgamaa","koht"=>35,"voitja"=>"m"),array("nimi"=>"Võrumaa","koht"=>46,"voitja"=>""),array("nimi"=>"Põlvamaa","koht"=>30,"voitja"=>""));

//var_dump($darv);
foreach($darv as $a){

	if($a["voitja"]=="Savisaar")
	{
		echo "Savisaar: ".$a["nimi"]."<br>";
	}
	else if ($a["voitja"]=="simson")
	{
		
		echo "Simson: ".$a["nimi"]."<br>";;
		
	}
	else if ($a["voitja"]=="m"){
		echo "Mõlemad: ".$a["nimi"]."<br>";;
		
	}
	
	
}
?>
