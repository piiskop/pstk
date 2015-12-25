<?php
require_once 'eksam_rebased.php';

//loon kolm rebase objekti , millel on omadused pikkus ja värvus
$rebased1 = new rebased ();
$rebased1->setPikkus ("suur");
$rebased1->setVarvus ("oranx");

$rebased2 = new rebased ();
$rebased2->setPikkus ("keksmine");
$rebased2->setVarvus ("punane");

$rebased3 = new rebased ();
$rebased3->setPikkus ("pisike");
$rebased3->setVarvus ("kollakas_punane");

//väljapirint, kuvan esimese rebase omadused (nool omistab muutjale X ...omaduse X)
echo $rebased2->getVarvus(). " ". $rebased1 ->getVarvus();
