<?php

include "bootstrap.php";

use AussieVoIP\IPND\Records\Address as IPNDAddress;
use AussieVoIP\IPNDDB\IPND\Address;

/*
$i = new IPNDAddress();
$i->setStreetNumber("1");
$i->setStreetName("FAKE", "ST");
$i->setLocality("4680", "GLADSTONE DC");

$a = new Address($em);;
$a->storeIPND($i);
$em->persist($a);
$em->flush();
var_dump($a->getId());

$i = new AussieVoIP\IPND\Records\Entity("BUSINESS");
$i->setContactNum("12345-1212");
$i->setName("Stupidly long name incorporated");

$e = new AussieVoIP\IPNDDB\IPND\Entity($em);
$e->storeIPND($i);
$em->persist($e);
$em->flush();
var_dump($e->getId());

*/

$e = $em->find("AussieVoIP\IPNDDB\IPND\Entity", 2);
var_dump($e->getIPND());

