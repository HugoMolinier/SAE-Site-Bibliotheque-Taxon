<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Collection Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="../Static/css/style.css">
        <link rel="stylesheet" href="../Static/css/cui.css">
        <link rel="stylesheet" href="../Static/css/Affichage_Collection_Utilisateur.css">
        <link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">
    </head>
    <body>
        <?php
            require_once '../Model/ModelUtilisateur.php';
            require_once '../Model/ModelRecherche.php';
            
            $rechercheES='Collection_membre';
            $query = ModelRecherche::cleanInput($_GET['query'] ?? "");
            $collection_vide= isset($_GET['collection_vide']) &&  $_GET['collection_vide'] == 0 ? 0 : 1;
            $ordre_nombre_éspèce =isset($_GET['ordreES']) && $_GET['ordreES'] === 'DESC' ? 'DESC' : 'ASC';
            $ordre_alphabétique =isset($_GET['ordreAlph']) && $_GET['ordreAlph'] === 'DESC' ? 'DESC' : 'ASC';


            require_once('./templates/Navbar.php');
            echo "<h1> Recherche par collection :</h1>";
            require_once ('./templates/Formulaire_Recherche.php');
        ?>


    <div class="Présentation">
    <?php 
    $all_utilisateur= ModelUtilisateur::obtenirTousLesMembres($collection_vide,$query,$ordre_nombre_éspèce,$ordre_alphabétique);
    foreach($all_utilisateur as $utilisateur): ?>
        <div class="carre_information">
            <h2> Collection de <?= htmlspecialchars(substr($utilisateur->getNom(),0,40)) ?></h2>
            <div class="gauche">
    
                Nombre d'espèces dans la collection : <?= $utilisateur->NombreEspece_Utilisateur() ?><br />
                Date de création Naturothèque: <?= $utilisateur->getDateInscription() ?><br />
                Date Dernière Modification de la naturothèque: <?= $utilisateur->GetLastModification() ?><br />
            </div>
            <form action="Collection_Utilisateur.php" method="GET">
                <input type='hidden' name='Id_Collection' value='<?= $utilisateur->getId() ?>'>
                <input class="button_collection" type="submit" value="Voir sa collection" />
            </form>
            <div class="clear">
    </div>
        </div>
    <?php endforeach; ?>
    </div>
    <?php
        require_once('./templates/Footer.html');  
    ?>