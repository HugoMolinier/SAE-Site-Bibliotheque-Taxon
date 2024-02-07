<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../Static/css/style.css">
    <link rel="stylesheet" href="../Static/css/cui.css">
    <link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">

        <script src="../Static/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="../Static/js/fonction_formulaire_checkbox.js"></script>
        <script src="../Static/js/toast_Ajout.js"></script>

</head>
<body>
<?php
require_once '../Model/ModelSession.php';
require_once '../Model/ModelTaxon.php';
require_once '../Model/ModelUtilisateur.php';
require_once '../Model/ModelRecherche.php';

$rechercheES='Collection_Utilisateur';

$ordre_alphabétique = isset($_GET['ordreAlph']) && $_GET['ordreAlph'] === 'DESC' ? 'DESC' : 'ASC';
$ordre_date = isset($_GET['ordre_date']) && $_GET['ordre_date'] === 'ASC' ? 'ASC' : 'DESC';
$lang = ModelRecherche::cleanInput($_GET['lang'] ?? null);
$langueChoisis = ModelRecherche::obtainNameOfLang($lang);

$id= null;
$imageaccept=true;
$session = Session::getInstance();
if (isset($_GET['Id_Collection']) && is_numeric($_GET['Id_Collection'])){
    $id = $_GET['Id_Collection'];
}
elseif ($session->contient('id')) {
    $id = $session->lire('id');
}


    require_once('./templates/Navbar.php');
    

    if ($id!=null) {
        $user = ModelUtilisateur::obtenirUtilisateurParID($id);
        if ($user != null){
            $data_taxa = $user->ObtenirTaxonEnregistrer($langueChoisis,$ordre_alphabétique,$ordre_date);
            echo "<h1> Collection de " . htmlspecialchars(substr($user->getNom(),0,40)) . " </h1>";
            require_once ('./templates/Formulaire_Recherche.php');
            require_once './templates/Affichage_Complete_Cui.php';
        }
    }else{
        header('Location: 404.php'); 
    }




    include('./templates/Footer.html');
?>
</body>