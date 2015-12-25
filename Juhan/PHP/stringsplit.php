<?php

function rearrange($params){
	$arrayOfOrigin=explode(' ',$params['origin']);
	$arrayOfResult = array();
	echo $params['neworder'];
	
	foreach (explode(",",$params['neworder']) as $order)
	{
		$arrayOfResult[]=$arrayOfOrigin[$order];
	}	
	
	echo implode(" ",$arrayOfResult);
}
rearrange(array("origin"=>"külmast tulest langes pime leek",
		"neworder"=>"2,1,0,4,3"))
?>	