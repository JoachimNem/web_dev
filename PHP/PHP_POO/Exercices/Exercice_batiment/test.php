<?php
include_once("Maison.php");

$batiment1 = new Batiment("12 rue de la Paix 59000 LILLE");
$batiment1->setSuperficie("1000m²");

echo $batiment1;


$maison1 = new Maison("34 avenue du Parc 59000 LILLE", "90m²", 4);

echo $maison1;

var_dump($maison1);
