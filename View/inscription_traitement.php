<?php
require_once '../model/ModelUtilisateur.php';
require_once '../Model/ModelSession.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $exist = ModelUtilisateur::verifierexistanceUtilisateur($_POST['mail']);
        if ($exist) {
            header('Location: inscription.php?action=E');
        }else{
            $Status = ModelUtilisateur::inscrireUtilisateur($_POST['pseudo'], $_POST['mail'], $_POST['mot_de_passe']);
            echo ($Status);
            if ($Status == true){
                echo 'aaaa';
                // Inscription réussie, créons une session pour l'utilisateur
                ModelUtilisateur::EnregistrerUtilisateurDansSession($_POST['mail']);
                header('Location:  Inscription_réussi.php');
            }
        }
    } catch (PDOException $e) {
        echo 'erreur' . $e;
    }
} else {
    echo "Données du formulaire incomplètes.";
}


?>

