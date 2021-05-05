<?php
include_once("Etudiant.php");
// include_once("Employe.php");
include_once("Professeur.php");

$etudiant1 = new Etudiant("OBAKA", "Med", "65678754");
$etudiant2 = new Etudiant("ALSENY", "Thomas", "87543543");
$employe1 = new Employe("DOUK", "Rachid", 10000.0);
$employe2 = new Employe("NGOYE", "Roland", 10000.0);
$professeur1 = new Professeur("OBA", "Kevin", 5700.0, "JAVA/JEE");
$professeur2 = new Professeur("MAGASSOUBA", "Cheick", 5000.0, "PHP");


echo "\nListe des étudiants :\n";
echo $etudiant1 . "\n";
echo $etudiant2 . "\n";
echo "Liste des employés :\n";
echo $employe1 . "\n";
echo $employe2 . "\n";
echo "Liste des professeurs :\n";
echo $professeur1 . "\n";
echo $professeur2 . "\n\n";

// $personne1 = new Personne(1, "DUPONT", "PAUL");
// echo "\n\n" . $personne1;
