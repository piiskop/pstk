<?php
require_once 'class/HelperOfBailiff.php';
require_once 'class/Lock.php';
require_once 'class/LockMaster.php';
require_once 'class/Owner.php';
$owner = new Owner();
$owner->setIsPresent(true);
$owner->setAgrees(false);

$lock = new Lock();
$lock->setIsLocked(true);

$helperOfBailiff = new HelperOfBailiff();
$helperOfBailiff->order($owner, $lock);

echo ' 100: Kas uks on lukus?'. $lock->getIsLocked();