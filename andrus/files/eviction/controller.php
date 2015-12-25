<?php
require 'error.php';
require_once 'class/HelperOfBailiff.php';
require_once 'class/Lock.php';
require_once 'class/LockMaster.php';
require_once 'class/Owner.php';


$owner = new Owner();

//kontroll
if(isset($_GET['eviction'])){

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
	//echo ' 31: <pre>'; var_dump($_GET);echo '</pre>';
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
		//echo ' 44 ';
		$owner->setIsPresent(true);
	}
}
//ehitamine
require_once 'EvictionView.php';

$page=EvictionView::buildFormOfEviction(array(
		'build_result'=>$buildResult,
		'result'=>(isset($duEvict) && $duEvict) ? 'Tõstetakse välja':'Ei tõsteta välaja',
		'owner'=>$owner
));

echo $page;