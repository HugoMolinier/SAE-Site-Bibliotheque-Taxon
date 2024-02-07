<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Taxon Détail</title>
    <link rel="stylesheet" href="../Static/css/style.css">
    <link rel="stylesheet" href="../Static/css/detail_taxon.css">
    <link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="../Static/js/jquery.js"></script>

                    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="../Static/js/fonction_formulaire_checkbox.js"></script>
    <script src="../Static/js/toast_Ajout.js"></script>
    <script src="../Static/js/Formulaire_Note.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>



</head>

<?php
require_once '../Model/ModelTaxon.php';
require_once '../Model/ModelSession.php';
require_once '../Model/ModelRecherche.php';
?>



<body>
<?php
include('./templates/Navbar.php');
if (!isset($_GET['id'])){header('Location: 404.php');}
$apirapide = $session->contient('apirapide') ? $session->lire('apirapide') : true;

$id=$_GET['id'];
$langueChoisis='scientificName';
$urlbase = "https://taxref.mnhn.fr/api/taxa/$id" ;
$datasearch=new ModelRecherche($urlbase);
$taxon = $datasearch->DataOfModelTaxon()[0];
/*$datainteractions=new ModelRecherche($urlbase . "/interactions");
$datalocalisation= new ModelRecherche($urlbase. "/status/lines");*/

if (isset($_POST['note'])&&($session->contient('id')) ){
    $taxon->RemplacerNote($_POST['note'],$session->lire('id'));
}

$query = isset($_GET['query'])? $_GET['query'] : NULL;
$fullname="<i>" . $taxon->getscientificName() . "</i>, " . $taxon->getAuthority() ;
$dataimage =ModelRecherche::getTaxonImageUrl($taxon,true,$apirapide);

?>
<div class="Présentation">
<div class="nav_présentation">
<a href="?id=<?=$id?>&query=main">Présentation</a>

        <a href="?id=<?=$id?>&query=loca">Information localisation</a>
        <a href="?id=<?=$id?>&query=rela">Relation</a>
        <a href="?id=<?=$id?>&query=ref">Référence Externe</a>
</div>
</div>

</div>
<?php if ($query=='main'|| $query==NULL): ?>
    

    <div class="Présentation">
        <div class="Image_Affichage">
            <img id="current-image" alt="Image">

            <div class="image-controls">
                <button class="prev-button" onclick="showPreviousImage()"> < </button>
                <button class="next-button" onclick="showNextImage()"> > </button>
            </div>
        </div>
        <div class="information">
            <?php


            echo '<h1>' . $fullname . '</h1> <hr>';

            require_once './templates/CheckBoxAddNaturotheque.php';
            $datafactsheet = new ModelRecherche($urlbase . "/factsheet");
            ?>


            
            <div class="carre_information">
                <p>Règne : <?= $datasearch->getOptionInData('vernacularKingdomName') ?? 'Non Défini'; ?></p>
                <p>Phylum : <?= $datasearch->getOptionInData('vernacularPhylumName') ?? 'Non Défini'; ?></p>
                <p>Classe : <?= $datasearch->getOptionInData('vernacularClassName') ?? 'Non Définie'; ?></p>
                <p>Ordre : <?= $datasearch->getOptionInData('vernacularOrderName') ?? 'Non Défini'; ?></p>
                <p>Famille : <?= $datasearch->getOptionInData('vernacularFamilyName') ?? 'Non Définie'; ?></p>
                <p><i>Rang taxonomique: <?= $datasearch->getOptionInData('rankName') ?? 'Non Défini'; ?></i></p>
            </div>
            <div class="carre_information">
                <p>Nom Scientifique : <?= $taxon->getscientificName() ?? 'Non Défini'; ?></p>
                <p>Nom Français : <?= $taxon->getfrenchVernacularName() ?? 'Non Défini'; ?></p>
                <p>Nom Anglais : <?= $taxon->getenglishVernacularName() ?? 'Non Défini'; ?></p>
            </div>
        
        </div>
    </div>


    <?php if (!($datafactsheet->isEmpty())): ?>
        <div class="Présentation">
            <div class="carre_information" id="Description">
                <?= $datafactsheet->getOptionInData('text') . '<br>' . $datafactsheet->getOptionInData('institution') . ',' . $datafactsheet->getOptionInData('year'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($session->contient('id')): ?>
        <div class="Présentation">
        <h2>Vos note sur le taxon</h2>
                <div class="carre_information" id="Description">
                    <?php $note=$taxon->obtenirNote($session->lire('id'));
                        if (isset($note)&&$note!=''){
                            echo '<h4 class="gauche">Note:</h4>';
                            echo '<p id="Note_text">' . htmlspecialchars($note) . '</p>';
                        }?>
                <button id="note-button" onclick="closeForm()">X</button>
                <form id="note-form" action="<?= $_SERVER['PHP_SELF'] . "?id=$id"; ?>" method="POST">
                <input type='hidden' name='id' value= "<?= $id?>" />
                <textarea id="note" name="note"><?=$note?></textarea>
                <button id="Button_delete" onclick="sendEmptyForm()">Supprimer note</button>
                    <button type="submit"  >Confirmer</button>
                </form>

                <?php
                    $buttonText = (isset($note)&&$note!='') ? 'Modifier votre note' : 'Ajouter une note' ;
                    ?>
                    <div class="button_selection">
                        <button id="Button_Open" onclick="showNoteForm()"><?php echo $buttonText; ?></button>
                         
                    </div>
                    </div>
                    </div>   
<?php else: ?>
    <div class="Présentation">
        Connectez-vous pour l'ajouter à votre naturothèque
        <a href="connexion.php" class="btn btn-primary">Se Connecter</a>
    </div>
<?php endif; ?>
    
<?php endif; ?>

<?php if ($query=='loca'): ?>

    <div class="Présentation">
        <div class="Image_Affichage">
            <img id="current-image" alt="Image">

            <div class="image-controls">
                <button class="prev-button" onclick="showPreviousImage()"> < </button>
                <button class="next-button" onclick="showNextImage()"> > </button>
            </div>
        </div>
        <div class="information">
            <h1><?=$fullname?></h1> <hr>
            <h2> Présence en France : </h2>
            <div class="carre_information" id="Description">
                <?php
                foreach($datasearch->filterArrayPrésence() as $key => $values){
                    echo ModelRecherche::ConvertirNomAbréviation($key) . " : " . ModelRecherche::ConvertirStatutPrésence($values);
                    echo "<br></hr>";
                }
                ?>
            </div>
            <br>
            <h2> Habitats </h2>
            <div class="carre_information" id="Description">
                <?php
                $datahabitats=$datasearch->getInfoHabitat();
                echo "<h4>" . ($datahabitats->getOptionInData('name') ? $datahabitats->getOptionInData('name') : "Non défini") . "</h4>";

                echo "<p>" . $datahabitats->getOptionInData('definition') . "<p>";
                ?>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>



    <?php

                
    $idGbif= (new ModelRecherche($urlbase . "/externalIds"))->GetGbifID();
    if ($idGbif!=0):
    ?>
    <div class="Présentation">
    <h2> Carte des occurrence enregistrer (GBIF) </h2>
                <div class="carre_information" id="Description">
                    <div id="map" style="height: 500px;"></div>
            </div>
            </div>
            <?php endif; ?>
<?php endif; ?>

<?php if ($query=='rela'): ?>
    <div class="Présentation">
        <div class="Image_Affichage">
            <img id="current-image" alt="Image">

            <div class="image-controls">
                <button class="prev-button" onclick="showPreviousImage()"> < </button>
                <button class="next-button" onclick="showNextImage()"> > </button>
            </div>
        </div>
        <div class="information">
        <h1><?=$fullname?></h1> <hr>
                <?php
                $dataclassification=ModelRecherche::ObtenirClassification($id);?>
                <div class="carre_information">
                <p>Domaine : <?= $dataclassification['Dumm'] ?? 'Non Défini'; ?></p>
                <p>Règne : <?= $dataclassification['KD'] ?? 'Non Défini'; ?></p>
                <p>Sous-Règne : <?= $dataclassification['SSRG'] ?? 'Non Défini'; ?></p>
                <p>Infra-Règne : <?= $dataclassification['IFRG'] ?? 'Non Défini'; ?></p>
                <p>Phylum : <?= $dataclassification['PH'] ?? 'Non Défini'; ?></p>
                <p>Sous-Phylum : <?= $dataclassification['SBPH'] ?? 'Non Défini'; ?></p>
                <p>Infra-Phylum : <?= $dataclassification['IFPH'] ?? 'Non Défini'; ?></p>
                <p>Super-Classe : <?= $dataclassification['SPCL'] ?? 'Non Définie'; ?></p>
                <p>Clade : <?= $dataclassification['CLAD'] ?? 'Non Définie'; ?></p>
                <p>Classe : <?= $dataclassification['CL'] ?? 'Non Définie'; ?></p>
                <p>Sous-Classe : <?= $dataclassification['SBCL'] ?? 'Non Définie'; ?></p>
                <p>Ordre : <?= $dataclassification['OR'] ?? 'Non Défini'; ?></p>
                <p>Sous-Ordre    : <?= $dataclassification['SBOR'] ?? 'Non Défini'; ?></p>
                <p>Famille : <?= $dataclassification['FM'] ?? 'Non Définie'; ?></p>
                <p>Genre : <?= $dataclassification['GN'] ?? 'Non Définie'; ?></p>
                

                </div>
        </div>
    </div> 

    <?php $datasynonyme = new ModelRecherche("https://taxref.mnhn.fr/api/taxa/$id/synonyms");
        $data_taxa= $datasynonyme->DataOfMULTIModelTaxon();
        $imageaccept=false;
        ?>

        <div class="Présentation">
        <h2> Synonyme du <?=$taxon->getscientificName()?></h2>
            <div class="carre_information" id="Description">
            
            <?php if (!empty($data_taxa)){require './templates/Affichage_Complete_Cui.php';}
            else{echo "<h4> Aucun synonyme existe pour ce Taxon </h4>";}
        ?>
               
            </div>
        </div>
    <?php endif; ?>

<?php if ($query=='ref'): ?>
    <div class="Présentation">
        <div class="Image_Affichage">
            <img id="current-image" alt="Image">

            <div class="image-controls">
                <button class="prev-button" onclick="showPreviousImage()"> < </button>
                <button class="next-button" onclick="showNextImage()"> > </button>
            </div>
        </div>
        <div class="information">
            <h1><?=$fullname?></h1> <hr>
            <h4> Autre site contenant ce taxon :</h4>
            <div class="carre_information">
                
                <?php
                $dataExterne = ModelRecherche::GetExternalRef($id);
                    foreach($dataExterne as $DatabaseName){?>
                        <p><a href="<?=$DatabaseName['url']?>" target="_blank"> <?=$DatabaseName['externalDbTitle']?> </a></p>
                <?php
                }?>
            </div>
        </div>
    </div>
    <?php
    $dataBibliographique = ModelRecherche::GetInfoBibliographique($id);
    if (!empty($dataBibliographique)):
        ?>
    
    <div class="Présentation">
        <h2> Apparition Bibliographique</h2>
            <div class="carre_information" id="Description">
            <?php
            foreach($dataBibliographique as $ReferenceCité){?>
                        <p class="texteBibliographique"><?=$ReferenceCité['sourceUse']?> :<br> <?=$ReferenceCité['source']?> </a></p>
                        <a class="button_link_biblio" href="<?=$ReferenceCité['pageUrl']?>" target="_blank">Voir la Citation</a>   
                <?php
                }?>
                    <div class="clear"></div>
            </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
<?php
    echo '<br>';
    $imageaccept=true;
    require_once './templates/Suggestion_affichage.php';
    require_once '../Static/js/Image_Taxon_Selection.php';
    require_once '../Static/js/Création_Carte_Occurence.php';
    include('./templates/Footer.html');
?>
</body>
 

</html>