<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Acceuil</title>
  
  	<!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="../Static/css/style.css">
<link rel="stylesheet" href="../Static/css/index.css">
<link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">



</head>
<body>
<!-- partial:index.partial.html -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php
    require '../Model/ModelCookie.php';
    include('./templates/Navbar.php');
?>

<!--Start rev slider wrapper-->     
<section class="rev_slider_wrapper">
  <div id="slider1" class="rev_slider"  data-version="5.0">
      <ul>
          
          <li data-transition="fade">
              <img src="../Static/images/slider/1.jpg"  alt="" width="1920" height="888" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
              
              <div class="tp-caption  tp-resizeme" 
                  data-x="left" data-hoffset="15" 
                  data-y="top" data-voffset="260" 
                  data-transform_idle="o:1;"         
                  data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                  data-splitin="none" 
                  data-splitout="none"
                  data-responsive_offset="on"
                  data-start="700">
                  <div class="slide-content-box">
                      <h1>TaxonConnect</h1>
                      <h3>Créez votre naturothèque</h3>
                      <p>Venez découvrir et apprendre le monde qui vous entoure grâce à notre application </p>                  </div>
              </div>
              <div class="tp-caption tp-resizeme" 
                  data-x="left" data-hoffset="15" 
                  data-y="top" data-voffset="480" 
                  data-transform_idle="o:1;"                         
                  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  data-start="2300">
                  <div class="slide-content-box">
                      <div class="button">
                          <a class="thm-btn" href="savoir_plus.php">En savoir plus</a>     
                      </div>
                  </div>
              </div>

          </li>
          <li data-transition="fade">
              <img src="../Static/images/slider/2.jpg"  alt="" width="1920" height="580" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
              
              <div class="tp-caption  tp-resizeme" 
                  data-x="center" data-hoffset="" 
                  data-y="top" data-voffset="275" 
                  data-transform_idle="o:1;"         
                  data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                  data-splitin="none" 
                  data-splitout="none"
                  data-responsive_offset="on"
                  data-start="700">
                  <div class="slide-content-box center">
                    <h1>TaxonConnect</h1>
                    <p>N'hésitez pas à explorer TaxonConnect et à nous contacter en cas de questions ou de suggestions pour rendre votre expérience encore plus enrichissante.</p>
                  </div>
              </div>
              <div class="tp-caption tp-resizeme" 
                  data-x="center" data-hoffset="-90" 
                  data-y="top" data-voffset="450" 
                  data-transform_idle="o:1;"                         
                  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  data-start="2300">
                  <div class="slide-content-box">
                      <div class="button">
                          <a class="thm-btn" href="savoir_plus.php">En savoir plus</a>     
                      </div>
                  </div>
              </div>
          </li>
          <li data-transition="fade">
              <img src="../Static/images/slider/3.jpg"  alt="" width="1920" height="888" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
              
              <div class="tp-caption  tp-resizeme" 
                  data-x="left" data-hoffset="500" 
                  data-y="top" data-voffset="260" 
                  data-transform_idle="o:1;"         
                  data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                  data-splitin="none" 
                  data-splitout="none"
                  data-responsive_offset="on"
                  data-start="700">
                  <div class="slide-content-box">
                    <h1>TaxonConnect</h1>
                    <h3>Possède plus de 75 millions d'èspèces</h3>
                    <p>Créez ton compte et partage vos espèces préférer avec les autres utilisateurs</p>
                  </div>
              </div>
              <div class="tp-caption tp-resizeme" 
                  data-x="left" data-hoffset="500" 
                  data-y="top" data-voffset="480" 
                  data-transform_idle="o:1;"                         
                  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  data-start="2300">
                  <div class="slide-content-box">
                      <div class="button">
                          <a class="thm-btn" href="savoir_plus.php">En savoir plus</a>     
                      </div>
                  </div>
              </div>
          </li>
      </ul>
  </div>
</section>
<!--End rev slider wrapper--> 


<section class="service sec-padd3">
  <div class="container">
      <div class="section-title center">
          <h2>Qui <span class="thm-color">sommes nous et notre objectifs</span> ?</h2>
      </div>
      <div class="row">
          <div class="col-md-3 col-sm-6 col-x-12">
              <div class="service-item center">
                  <div class="icon-box">
                      <span class="icon-can"></span>
                  </div>
                  <h4>Biodiversité</h4>
                  <p>La diversité des espèces est une composante essentielle de la biodiversité. Des millions d'espèces végétales ou animales, peuplent la Terre, chacune apportant sa contribution unique à l'équilibre écologique.</p>
             </div>
          </div>
          <div class="col-md-3 col-sm-6 col-x-12">
              <div class="service-item center">
                  <div class="icon-box">
                      <span class="icon-tool"></span>
                  </div>
                  <h4>Naturothèque </h4>
                  <p>Permet aux utilisateurs de recueillir, organiser et partager des informations sur la nature, généralement en rapport avec la biodiversité, la faune, la flore, les observations naturalistes, etc. </p>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 col-x-12">
              <div class="service-item center">
                  <div class="icon-box">
                      <span class="icon-nature-1"></span>
                  </div>
                  <h4>Données fiable</h4>
                  <p>Nous sommes fiers de vous assurer que les données que nous mettons à votre disposition sont fiables, certifiées et proviennent de l'INPN (Inventaire National du Patrimoine Naturel). </p>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 col-x-12">
              <div class="service-item center">
                  <div class="icon-box">
                      <span class="icon-deer"></span>
                  </div>
                  <h4>Découverte</h4>
                  <p>Explorer le monde fascinant de la faune, c'est plonger dans une aventure perpétuelle de découvertes, d'émerveillement et de compréhension des merveilles de la nature.</p>
              </div>
          </div>
      </div>
  </div>
</section>


<section class="about sec-padd2">
  <div class="container">
      <div class="section-title center">
          <h2>Le Taxon du mois !</h2>
          <p>Voici le taxon qu'on a choisi ce mois-ci selon vos Retours. Si vous avez des propositions ajouter a vos naturothèque.</p>
      </div>
      <div class="row">
          <div class="col-md-6 col-sm-12">
              <figure class="img-box">
                  <img src="../Static/images/resource/8.jpg" alt="">
              </figure>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="content">
                  <h2>Qui est-il?</h2>
                  <div class="text">
                      <p>Vous l'avez surement reconnu, c'est le Rouge-gorge (Erithacus rubecula). Un petit oiseau chanteur au plumage distinctif. Les caractéristiques principales de cette espèce incluent sa taille modeste, sa poitrine orange vif, son ventre blanc et son dos brun olive. La gorge, d'où provient son nom, est d'un rouge éclatant, contrastant vivement avec le reste de son plumage.</p>
                  </div>
                  <h4>Le Rouge-gorge a une particularité !</h4>
                  <div class="text">
                      <p>Cet oiseau est souvent apprécié pour son comportement audacieux et curieux. Il est connu pour s'approcher des jardins et des habitations humaines, permettant aux observateurs d'oiseaux de l'admirer de près. Le Rouge-gorge est également réputé pour son chant mélodieux, émis tout au long de l'année, même pendant les mois d'hiver.</p>
                  </div>
                  <div class="link"><a href="Taxon_détail.php?id=4001" class="thm-btn style-2">En savoir plus</a></div>
              </div>
          </div>
      </div>
      
  </div>
</section>

<section class="gallery sec-padd3 style-2 default-gallery" style="background-image: url(../Static/images/background/8.jpg)";>
  <div class="container">
      <div class="section-title">
          <h2>Suggestion</h2>
      </div>
      <ul class="post-filter style-3 list-inline float_right">
          <li class="active" data-filter=".filter-item">
              <span>Tous</span>
          </li>
          <li data-filter=".Ecology">
              <span>Terreste</span>
          </li>
          <li data-filter=".Wild-Animals">
              <span>Continental</span>
          </li>
          <li data-filter=".Water">
              <span>Marin</span>
          </li>
      </ul>
      <div class="row filter-layout">

          <article class="col-md-3 col-sm-6 col-xs-12 filter-item Wild-Animals Pollution Water">
              <div class="item">
                  <div class="img-box">
                      <img src="../Static/images/resource/2.jpg" alt="">
                      <div class="overlay">
                          <div class="inner-box">
                              <div class="content-box">
                                  
                                  <a href="Taxon_détail.php?id=425145"><i class="fa fa-link"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="content center">
                      <h4>Parupeneus ciliatus</h4>
                      <p>Animaux</p>
                  </div>
              </div>
          </article> 
          <article class="col-md-3 col-sm-6 col-xs-12 filter-item Wild-Animals Pollution Ecology Recycling">
              <div class="item">
                  <div class="img-box">
                      <img src="../Static/images/resource/1.jpg" alt="">
                      <div class="overlay">
                          <div class="inner-box">
                              <div class="content-box">
                                    <a href="Taxon_détail.php?id=446369"><i class="fa fa-link"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="content center">
                  <h4>Pinus caribaea</h4>
                      <p>Plantes</p>
                  </div>
              </div>
          </article> 
          <article class="col-md-3 col-sm-6 col-xs-12 filter-item Wild-Animals Pollution Ecology Recycling">
              <div class="item">
                  <div class="img-box">
                      <img src="../Static/images/resource/3.jpg" alt="">
                      <div class="overlay">
                          <div class="inner-box">
                              <div class="content-box">
                                  <a href="Taxon_détail.php?id=699127"><i class="fa fa-link"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="content center">
                      <h4>Salamandra lanzai</h4>
                      <p>Animaux</p>
                  </div>
              </div>
          </article>
          <article class="col-md-3 col-sm-6 col-xs-12 filter-item Wild-Animals Pollution Water">
              <div class="item">
                  <div class="img-box">
                      <img src="../Static/images/resource/4.jpg" alt="">
                      <div class="overlay">
                          <div class="inner-box">
                              <div class="content-box">
                                  <a href="Taxon_détail.php?id=383445"><i class="fa fa-link"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="content center">
                      <h4>Hesione splendida</h4>
                      <p>Animaux</p>
                  </div>
              </div>
          </article>
      </div>

  </div>
</section>

<?php
        include('./templates/Footer.html');
    ?>


<!-- jQuery -->
<script src="../Static/js/jquery.js"></script>
<script src="../Static/js/bootstrap.min.js"></script>
  <script src="../Static/js/jquery.appear.js"></script>
  <script src="../Static/js/isotope.js"></script> 
  <script src="../Static/js/pie-chart.js"></script>
<script src^="../Static/js/main.js"></script>


<!-- revolution slider js -->
  <script src="../Static/js/rev-slider/jquery.themepunch.tools.min.js"></script>
  <script src="../Static/js/rev-slider/jquery.themepunch.revolution.min.js"></script>
  <script src="../Static/js/rev-slider/revolution.extension.layeranimation.min.js"></script>

  <script src="../Static/js/rev-slider/revolution.extension.navigation.min.js"></script>
  
  <script src="../Static/js/rev-slider/revolution.extension.parallax.min.js"></script>
  <script src="../Static/js/rev-slider/revolution.extension.slideanims.min.js"></script>


  <script src="../Static/js/custom.js"></script>

</div>

</body>
</html>
