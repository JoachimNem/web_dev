<?php

include_once("Personne.php");

// Cas avec constructeur par défaut 
// $personne1 = new Personne();
// $personne1->setNom("DUPONT");
// $personne1->setPrenom("David");
// $personne1->setDateNaissance("12/12/2020");

// Cas avec constructeur par défaut mais plus élégant (return $ this dans les setters)
$personne1 = (new Personne())->setNom("DUPONT")->setPrenom("David")->setDateNaissance("12/12/2020");

// Cas avec constructeur spécifique
// $personne1 = new Personne("DUPONT", "David", "12/12/2020");
// $personne2 = new Personne("DUGRAND", "Luc", "12/08/2020");
// $personne3 = new Personne("PETIT", "Paul", "12/12/2010");


// $personne1->setDateNaissance("20/12/2020");

echo $personne1;
// echo $personne2;
// echo $personne3;

// echo "Je m'appelle " . $personne1->getPrenom() . " " . $personne1->getNom() . ". Je suis né le " .
//     $personne1->getDateNaissance();
