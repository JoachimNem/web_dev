<?php
include_once("Personne.php");

$personne1 = (new Personne())->setNom("DUPONT")->setPrenom("David")->setid(120);
var_dump($personne1);
