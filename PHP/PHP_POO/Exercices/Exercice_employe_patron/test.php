<?php

include_once("Ouvrier.php");
include_once("Cadre.php");
include_once("Patron.php");

$o = new Ouvrier("123456", "DUPONT", "David", "01/01/1950", new DateTime("12/12/1900"));

echo $o->getSalaire() . "\n";

$cadre = new Cadre("123456", "DUPONT", "David", "01/01/1950");
$cadre->setIndice(13);

echo $cadre->getSalaire() . "\n";

$patron = new Patron("123456", "DUPONT", "David", "01/01/1950", 50);

echo $patron->getSalaire();
