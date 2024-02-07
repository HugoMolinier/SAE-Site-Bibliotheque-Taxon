<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Acceuil</title>
  
  	<!-- mobile responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<link rel="stylesheet" href="../Static/css/style.css">

</head>
<body>
    <br> <br> <br> <br>
<?php
require_once '../Model/ModelRecherche.php';
include('./templates/Navbar.php');


$start_time = microtime(true);
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La réponse de notre base de données est en $execution_time secondes.";

$rep=100;
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url= "https://taxref.mnhn.fr/api/taxa/search?size=1000&page=1" ;
$Recherche_Actuel = new ModelRecherche($url,$rep);

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande search taille 1000 avec l'api a été exécuté en moyennes: $execution_time secondes (pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url= "https://taxref.mnhn.fr/api/taxa/search?size=200&page=1" ;
$Recherche_Actuel = new ModelRecherche($url,$rep);

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande search taille 200 avec l'api a été exécuté en moyennes: $execution_time secondes (pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url= "https://taxref.mnhn.fr/api/taxa/search?frenchVernacularNames=Sapin&page=1&size=200" ;
$Recherche_Actuel = new ModelRecherche($url,$rep);

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande search taille 200 en recherchant 'Sapin' avec l'api a été exécuté en moyennes: $execution_time secondes (pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url= "https://taxref.mnhn.fr/api/taxa/search?size=100&page=1" ;
$Recherche_Actuel = new ModelRecherche($url,$rep);

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande search taille 100 avec l'api a été exécuté en moyennes: $execution_time secondes (pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url= "https://taxref.mnhn.fr/api/taxa/search?size=50&page=1" ;
$Recherche_Actuel = new ModelRecherche($url,$rep);

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande search taille 50 avec l'api a été exécuté en moyennes: $execution_time secondes (pour $rep execution). \n";

/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url = "https://taxref.mnhn.fr/api/taxa/186338/children";
$Recherche_Actuel = new ModelRecherche($url,$rep);
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande children de 186338 a été exécuté en moyennes: $execution_time secondes(pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url = "https://taxref.mnhn.fr/api/taxa/4001/classification";
$Recherche_Actuel = new ModelRecherche($url,$rep);
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande classification a été exécuté en moyennes: $execution_time secondes(pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url= "https://taxref.mnhn.fr/api/taxa/autocomplete?term=Va&page=1&size=100" ;
$Recherche_Actuel = new ModelRecherche($url,$rep);
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La requete autocomplet recherchant 'Va' (taille 100) avec l'api a été exécuté en moyennes: $execution_time secondes (pour $rep execution). \n";
/*=====================================*/
echo "<br>";
$start_time = microtime(true);
$url = "https://taxref.mnhn.fr/api/taxa/autocomplete?term=Sap&page=1&size=200";
$Recherche_Actuel = new ModelRecherche($url,$rep);
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
echo "La demande autocomplete avec 'sap' (taille 200) a été exécuté en moyennes: $execution_time secondes(pour $rep execution). \n";


?>


