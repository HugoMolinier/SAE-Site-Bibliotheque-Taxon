<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>En savoir plus</title>
    <link rel="stylesheet" href="../Static/css/style.css">
    <link rel="stylesheet" href="../Static/css/savoirplus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"rel="stylesheet"/>
</head>
<body>
    <?php
        require_once '../Model/ModelCookie.php';
        require_once('./templates/Navbar.php');
    ?>
  </head>
  <body>
    <section class="a_savoir"> 
    <div class="row">
            <h1>A savoir </h1>
        </div>
        <div class="row">
            <p>

            Bienvenue sur TaxonConnect ! Nous sommes une équipe passionnée qui a créé ce site dans le but de fournir une plateforme éducative sur la biodiversité. Notre mission est de fournir des informations précieuses sur différentes espèces.

Chez TaxonConnect, nous croyons en certaines valeurs fondamentales qui guident notre travail quotidien : </br>

Passion pour la Nature : Nous sommes profondément passionnés par le monde naturel et nous croyons en la nécessité de le préserver pour les générations futures.</br>

Engagement envers l'Environnement : Nous nous engageons à prendre des mesures positives pour soutenir l'environnement. Cela inclut la promotion de pratiques durables et la sensibilisation à l'importance de la conservation.</br>

Explorez notre site pour découvrir des informations fascinantes et utiles sur la nature, la biodiversité et bien plus encore. N'hésitez pas à nous contacter si vous avez des questions, des suggestions ou si vous souhaitez en savoir plus sur notre mission et nos valeurs. Merci de faire partie de notre communauté dédiée à la préservation de notre planète !
            </p>
        </div>
    </section>

    <section>
      <div class="row">
        <h1>L'équipe De TaxonConnect</h1>
      </div>
      <div class="row">
        <!-- Column 1-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="../Static/images/logo/Photo_de_damien.png" />
            </div>
            <h3>Damien Sabau</h3>
            <p>Développement Front-End</p>
            <div class="icons">
              <a href="#">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fab fa-github"></i>
              </a>
              <a href="#">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 2-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="profile-img-2.png" />
            </div>
            <h3>Hugo Molinier</h3>
            <p>Développement Back-end</p>
            <div class="icons">
              <a href="#">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fab fa-github"></i>
              </a>
              <a href="#">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 3-->
        <div class="column">
          <div class="card">
            <div class="img-container">
              <img src="../Static/images/logo/Photo_de_kais.jpeg"/>
            </div>
            <h3>Kaïs Dilmi</h3>
            <p>Designer</p>
            <div class="icons">
              <a href="#">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fab fa-github"></i>
              </a>
              <a href="#">
                <i class="fas fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
</br>
</br>
</br>
</br>

    <?php
        require_once('./templates/Footer.html');
    ?>
  </body>
</html>