<?php
    $taxonId = $taxon->getId_taxon();
    $taxonName= ModelTaxon::VerifierNomNotNULL($taxon, $langueChoisis);
    $apirapide = $session->contient('apirapide') ? $session->lire('apirapide') : true;
    $imageUrl=false;
    echo '<li class="company">';
    if (!isset($apirapide)){
        $start_time = microtime(true);
    }
    if ($imageaccept){
        $imageUrl = ModelRecherche::getTaxonImageUrl($taxon,true,$apirapide)[0];
    }
    if (!isset($apirapide)){
        $totaltime = microtime(true) - $start_time;
        if ($totaltime>=1){
            $session->enregistrer('apirapide', $totaltime >= 1 ? false : true);
        }
    }
    if ($imageUrl) {
        echo '<div class="company__info">';
        echo '<a href="./Taxon_détail.php?id=' . $taxonId . '">';
        echo "<img src=\"$imageUrl\" alt='Image API' style='max-width: 100%; height: auto;'>";
        echo '</a>';
        echo '</div>';
    }
    echo '<ul class="company__details">';
    echo '<a href="./Taxon_détail.php?id=' . $taxonId . '">';
    echo "<div class='company__label'> " . $taxonName . "</div>";
    echo '</a>';
    require 'CheckBoxAddNaturotheque.php';
    echo '</ul>';
    echo '</li>';

?>