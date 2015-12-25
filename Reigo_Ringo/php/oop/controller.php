<?php

require_once 'conf.php';
require 'owner.php';
require 'lock.php';
require 'bailiffhelper.php';
require 'locksmith.php';
require 'policeman.php';

$omanik = new Owner;
$lukk = new Lock;
$abi = new BailiffHelper;
$lukuavaja = new LockSmith;
$politseinik = new Policeman;

if (isset($_GET['is_time_agreed']) && isset($_GET['is_agreed_time'])){

	if (isset($_GET['owner_situation']) && isset($_GET['owner_response'])){

		if($_GET['owner_situation'] == 'reachable' || $_GET['owner_situation'] == 'present' ){

			$omanik->setIsContactable(true);
			
			//saab omanikuga suhelda, nüüd ta vastus
			
			if($_GET['owner_response'] == 'yes'){
				 
				//lukk lahti
				$abi->giveOrder(true);
				$lukuavaja->openLock(true);
				$lukk->setIsLocked(false);
				
			}
			if($_GET['owner_response'] == 'no'){
				
				//lukk jääb kinni
				$abi->giveOrder(false);
				$lukuavaja->openLock(false);			
				$lukk->setIsLocked(true);
				
				//politsenik sekkub
				$politseinik->setInterferes(true);
			}	
	
			if (isset($_GET['figthing'])){
			
				$omanik->isFighting(true);
				$abi->isFighting(true);
				$politseinik->setInterferes(true);
			}
			
			$politseinik->setInterferes(false);
			
		}
		else{
			
			$politseinik->setInterferes(false);
			$omanik->setIsContactable(false);
			
			//lukk lahti
			$abi->giveOrder(true);
			$lukuavaja->openLock(true);		
			$lukk->setIsLocked(false);
		}

	}
	
}

else{
	$lukk->setIsLocked(true);
}

$vastus = $lukk->getIsLocked();

require_once 'millegiView.php';

if($vastus == true){
	$page = millegiView::vastus(array(
			'vastus'=>'Lukk on kinni'
		)
	);
}
else{
	$page = millegiView::vastus(array(
			'vastus'=>'Lukk on lahti'
		)
	);	
}

echo $page;
