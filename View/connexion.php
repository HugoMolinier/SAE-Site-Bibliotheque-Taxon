<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../Static/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">
    <link rel="stylesheet" href="../Static/css/register.css">
</head>
<body>
    <?php
        require '../model/ModelCookie.php';
        include('./templates/Navbar.php');
    ?>

    <div class="register-container">
        <h2>Connectez-vous à </br>
votre compte</h2>
        <form action="connexion_traitement.php" method="post">
            <label for="mail">E-mail :</label>
            <input type="email" name="mail" id="mail" required><br>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required><br>
            <?php if (isset($_GET['action']) && $_GET['action'] == "E") {
                echo "<p class='red'> Mot de passe ou adresse mail invalide ! </p>";
            } ?>

            <input type="submit" value="Se connecter" id="submit-button">
        </form>

        <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a></p>
    </div>
</body>
</html>