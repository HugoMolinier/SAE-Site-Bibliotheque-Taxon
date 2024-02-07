<?php
    $taxonName= ModelTaxon::VerifierNomNotNULL($taxon, $langueChoisis);
    $link = ModelRecherche::generateLink($options,$taxon);

    echo "<form action='Recherche.php' method='GET' class='company_rang' >";
    echo "<input type='hidden' name='link' value='" . $link . "'/>";
    echo "<input type='hidden' name='lang' value='" . $lang . "'/>";
    echo "<button type='submit'>";
    echo "<h3 >" . $taxonName . "</h3>";
    echo "</button>";
    echo "</form>";
?>