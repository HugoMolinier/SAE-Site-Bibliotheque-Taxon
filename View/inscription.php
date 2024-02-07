<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../Static/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">
    <link rel="stylesheet" href="../Static/css/register.css">
</head>
<body>
    <?php
        require '../Model/ModelCookie.php';
        include('./templates/Navbar.php');
    ?>

    <div class="register-container">
        <h2>Inscription</h2>
        <form action="inscription_traitement.php" method="post" id="inscription-form">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <label for="mail">E-mail :</label>
            <input type="email" name="mail" id="mail">
                <?php if (isset($_GET['action']) && $_GET['action'] == "E") {
                    echo "<p class='red'> Veuillez saisir un e-mail valide </p>";
                } ?>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required><br>

            <input type="submit" value="S'inscrire" id="submit-button">
        </form>

        <p>Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a></p>
    </div>
</body>
</html>