
<section class="suggestion" style="background-image: url(../Static/images/background/8.jpg)";>
    <h2 class='white'> Suggestion </h2>
    <?php
        $data_taxa= ModelRecherche::ObtenirSuggestion($datasearch->getOptionInData('vernacularGroup2'));
        if (empty($data_taxa)){
            $data_taxa= ModelRecherche::ObtenirSuggestion($datasearch->getOptionInData('vernacularGroup1'));
        }
        require 'Affichage_Complete_Cui.php';
    ?>
</section>