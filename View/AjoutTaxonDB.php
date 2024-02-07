<?php
// AjoutTaxonDB.php

// Inclure vos classes et fichiers nécessaires
require_once '../Model/ModelTaxon.php';

// Récupérer les données du formulaire
$statut = isset($_POST['statut']) ? $_POST['statut'] : null;
$idUtilisateur = isset($_POST['idUtilisateur']) ? $_POST['idUtilisateur'] : null;
$idTaxon = isset($_POST['id']) ? $_POST['id'] : null;
$fullNameHtml = isset($_POST['fullNameHtml']) ? $_POST['fullNameHtml'] : '';
$scientificName = isset($_POST['scientificName']) ? $_POST['scientificName'] : '';
$frenchVernacularName = isset($_POST['frenchVernacularName']) ? $_POST['frenchVernacularName'] : '';
$regne = isset($_POST['regne']) ? $_POST['regne'] : '';
$englishVernacularName = isset($_POST['englishVernacularName']) ? $_POST['englishVernacularName'] : '';
$authority = isset($_POST['authority']) ? $_POST['authority'] : '';

// Traitement en fonction du statut

if ($statut !== null && $idUtilisateur !== null) {
    if ($statut === 'true') {
        // Ajouter le taxon à la base de données
        ModelTaxon::ajouter($idTaxon, $scientificName,$frenchVernacularName,$englishVernacularName,$regne,$authority, $idUtilisateur);
        echo "Taxon ($idTaxon - $idUtilisateur) ajouté avec succès!";
    } else {
        // Supprimer le taxon de la base de données
        ModelTaxon::supprimer($idTaxon, $idUtilisateur);
        echo "Taxon ($idTaxon - $idUtilisateur)  supprimé avec succès!";
    }
} else {
    echo 'Erreur: Les données du formulaire sont incomplètes.';
}
?>
