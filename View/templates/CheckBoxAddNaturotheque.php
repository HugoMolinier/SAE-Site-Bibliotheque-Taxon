<?php
if ($session->contient('id')) {
    $taxonId = $taxon->getId_taxon();
    $taxonName= ModelTaxon::VerifierNomNotNULL($taxon, $langueChoisis);
    $statut_ajout = ModelTaxon::StatutOfTaxon($taxonId,$session->lire('id'));

    ?>
    <form id="Add<?php echo $taxonId; ?>" method="POST">
        <input id="statut" name="statut" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $statut_ajout; ?>">
        <input id="idUtilisateur" data-taxon-id="<?php echo $taxonId; ?>" name="idUtilisateur" type="hidden" value="<?php echo $session->lire('id'); ?>">
        <input id="id" name="id" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxonId; ?>">
        <input id="scientificName" name="scientificName" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxon->getscientificName(); ?>">
        <input id="frenchVernacularName" name="frenchVernacularName" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxon->getfrenchVernacularName(); ?>">
        <input id="fullNameHtml" name="fullNameHtml" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxonName; ?>">

        <input id="englishVernacularName" name="englishVernacularName" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxon->getenglishVernacularName(); ?>">
        <input id="regne" name="regne" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxon->getregne(); ?>">


        <input id="authority" name="authority" data-taxon-id="<?php echo $taxonId; ?>" type="hidden" value="<?php echo $taxon->getAuthority(); ?>">

        
        
        <label for="AddTaxon" class="checkbox-label">
            <input type="checkbox" id="AddTaxon" data-taxon-id="<?php echo $taxonId; ?>" data-status="<?php echo $statut_ajout; ?>" data-fullNameHtml="<?php echo $taxonName; ?>" <?php if($statut_ajout){echo 'checked';} ?> onchange="updateFormSubmitTaxa('<?php echo $taxonId; ?>')">
            <span class="checkmark"></span>
        </label>
</form>
<?php
}
?>