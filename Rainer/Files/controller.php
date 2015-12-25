<?php
require_once dirname(__FILE__).'/Inimene.php';

$List = Inimene ::getAll();
foreach ($list as $id => $inimene){
	echo "Inimene :$inimene\n";
	} 

