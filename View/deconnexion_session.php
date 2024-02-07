<?php
    require_once '../Model/ModelSession.php'; // Incluez la classe Session
    require_once '../Model/ModelCookie.php'; 
    // Détruire la session en cours
    $session = Session::getInstance();
    $session->detruire();
    
    // Redirigez l'utilisateur vers une page de confirmation de déconnexion ou une autre page
    header('Location: ../View/index.php'); // Remplacez avec la page de votre choix
?>
