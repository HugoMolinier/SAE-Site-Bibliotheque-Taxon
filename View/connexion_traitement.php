<?php
require_once '../model/ModelUtilisateur.php';
require_once '../Model/ModelSession.php'; // Incluez la classe Session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $Status = ModelUtilisateur::Connexion_Utilisateur($_POST['mail'],$_POST['mot_de_passe']);
        if ($Status== false){
            header('Location:  Connexion.php?action=E');
        }
        if ($Status == true){
            // Inscription réussie, créons une session pour l'utilisateur
            ModelUtilisateur::EnregistrerUtilisateurDansSession($_POST['mail']);

            header('Location:  connexion_réussi.php');
        }
       
    }catch (PDOException $e) {
        echo 'erreur :' . $e;
    }
} else {
    echo "Données du formulaire incomplètes.";
}

?>
