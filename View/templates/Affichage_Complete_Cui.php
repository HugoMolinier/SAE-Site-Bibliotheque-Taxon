<?php
    $i = 0; 
    $rechercheES= $rechercheES ?? 1;
    $Data_obtain_url= $Data_obtain_url ?? [];
    $options =$options ?? [];

    $count_Data_obtain_url = count($Data_obtain_url);
    $count_data_class= count($data_taxa);
    echo '<div class="container">';
    foreach ($data_taxa as $taxon) {
        if ($i % 4 == 0) {
            echo '<div class="row">';
        }
        echo '<div class="col-md-3 col-sm-5 col-12">';
        if ($rechercheES==0 && $count_Data_obtain_url!=3){    
            require 'Affichage_Par_Classe.php';          
        }else{
            /*Crée le taxon si recherche.php */
            require 'Affichage_Par_Espèce.php';
        }
        echo '</div>';// Fermeture div col-md-3
        if ($i % 4 == 3 || $i == $count_data_class - 1) {
            echo '</div>'; // Fermeture div Row
        }
        $i++;
    }
    if ($i%4 !=0){
        echo '</div>'; // Fermeture div Row si pas finit la ligne
    }
    echo "</div>";// Fermeture div container
?>