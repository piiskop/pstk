<?php
require_once "Producer.php";
$producer = new Producer;
$producer->setNameOfProducer('WTI');
echo $producer->getNameOfProducer();