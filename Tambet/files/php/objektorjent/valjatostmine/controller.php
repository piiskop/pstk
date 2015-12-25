<?php
require 'error.php';
require_once 'Abi.php';
require_once 'Lock.php';
require_once 'LockMaster.php';
require_once 'Owner.php';


$owner = new Owner();

//kontroll
if(isset($_GET['valjatostmine'])){

	$buildResult=true;
	if(isset($_GET['isOwnerPresent'])){
		$duEvict=false;
		$owner->setIsPresent(true);
		if(isset($_GET['isOwnerAgree'])){
			$owner->setAgrees(true);
		}else{
			$owner->setAgrees(false);
		}
	}else {
		$duEvict=true;
		$owner->setIsPresent(false);
		if(isset($_GET['isOwnerReachable'])){
			$owner->setIsReachable(true);
			if(isset($_GET['isOwnerAgree'])){
				$owner->setAgrees(true);
			}else{
				$owner->setAgrees(false);
			}
		}else {
			$owner->setIsReachable(false);
		}
	}
}else{
	$buildResult=false;
		if(!isset($_GET['isOwnerReachable'])){
		$owner->setIsReachable(false);
		if(!isset($_GET['isOwnerPresent'])){
			$owner->setAgrees(false);
			if(!isset($_GET['isOwnerAgree'])){
				$owner->setAgrees(false);
			}else {
				$owner->setAgrees(true);
			}
		}else {
			$owner->setIsReachable(true);
		}
	}else {
	
		$owner->setIsPresent(true);
	}
}
//ehitamine
require_once 'Valjatostmine.php';

$page=ValjatostmineView::buildFormOfValjatostmine(array(
		'build_result'=>$buildResult,
		'result'=>(isset($duEvict) && $duEvict) ? 'LUBATUD':'KEELATUD',
		'owner'=>$owner
));

echo $page;