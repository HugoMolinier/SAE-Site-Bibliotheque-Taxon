<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Recherche</title>

        <link rel="stylesheet" href="../Static/css/style.css">
        <link rel="stylesheet" href="../Static/css/cui.css">
        <link rel="shortcut icon" type="image/png" href="../Static/images/logo/logo.png">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script src="../Static/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="../Static/js/fonction_formulaire_checkbox.js"></script>
        <script src="../Static/js/toast_Ajout.js"></script>
        

    </head>


    <body>
    <?php
        require_once '../Model/ModelCookie.php';
        require_once '../Model/ModelSession.php';
        require_once '../Model/ModelRecherche.php';
        require_once '../Model/ModelTaxon.php';

        $Data_obtain_url=[];
        $options=[];
        if (isset($_GET['link']) && $_GET['link']) {
            $Data_obtain_url= ModelRecherche::GetFormatLink($_GET['link']);
            foreach ($Data_obtain_url as $copy){
                $options[] =$copy['nom'] . '+' . $copy['id'];
             }
        }
        
        $rechercheES = Cookie::lire('rechercheES') ?? 0;
        if (isset($_GET['rechercheES'])) {// La case à cocher a été cochée, stocker en cookkoe
            $rechercheES = ModelRecherche::cleanInput($_GET['rechercheES'] === '1' || $_GET['rechercheES'] === 'on' ) ? 1 : 0;
            Cookie::enregistrer('rechercheES', $rechercheES, 3600); 
        } 
        $query = ModelRecherche::cleanInput($_GET['query'] ?? null);
        $lang = ModelRecherche::cleanInput($_GET['lang'] ?? null);

        $FRName = ($lang == 'FR') ? $query : null;
        $ENname = ($lang == 'EN') ? $query : null;
        $scientificNames = ($lang != 'FR' && $lang != 'EN') ? $query : null;

        $habitas = (isset($_GET['habitats']) && ($temp = ModelRecherche::cleanInput($_GET['habitats'])) > 0 && $temp <= 8 && $temp != 7) ? $temp : null;

        $page = ModelRecherche::cleanInput($_GET['page'] ?? 1);

        $nombre_element = (strlen($query) <= 3) ? 50 : 100;
        $langueChoisis = ModelRecherche::obtainNameOfLang($lang);
        $typerecherche= $rechercheES===0 ? 'Rang':"Espèce";
        $imageaccept=true;

        require_once ('./templates/Navbar.php');
        echo "<h1> Recherche par $typerecherche :</h1>";
        require_once ('./templates/Formulaire_Recherche.php');

        $A = ['KD', 'PH','CL','ES'];
        $B=['kingdomName','phylumName','className'];
        $start_time = microtime(true);/*en cas d'api lente*/
        if ($rechercheES == 0) {// Recherche par rang
            if (count($Data_obtain_url)==3 ) {
                $url = "https://taxref.mnhn.fr/api/taxa/" . (end($Data_obtain_url)['id']) . "/children";
                $data_taxa = (new ModelRecherche($url))->removeSynonyme(true);
            }else {
                $url = "https://taxref.mnhn.fr/api/taxa/search?taxonomicRanks=" . $A[count($Data_obtain_url)] . "&page=1&size=5000";
                if ($Data_obtain_url){$data_taxa = (new ModelRecherche($url))->getDescendants($B[count($Data_obtain_url)-1],end($Data_obtain_url)['nom']);}
                else{$data_taxa = (new ModelRecherche($url))->removeSynonyme(true);}
            }
        }else{ //Recherche par espèce uniquement
            $url= "https://taxref.mnhn.fr/api/taxa/search?taxonomicRanks=ES&scientificNames=$scientificNames&frenchVernacularNames=$FRName&englishVernacularNames=$ENname&habitats=$habitas&size=$nombre_element&page=" . $page ;
            $Recherche_Actuel = new ModelRecherche($url);
            $data_page = $Recherche_Actuel->GetPage();
            $data_taxa = ($Recherche_Actuel->removeSynonyme(true));
        }   
        $total_time = microtime(true) - $start_time;/*en cas d'api lente*/
        $session->enregistrer('apirapide', $total_time < 2.0);
        if ($data_taxa) {require_once './templates/Affichage_Complete_Cui.php';}   

        if ($rechercheES==1){ require_once './templates/carré_pagination.php';}


        require_once ('./templates/Footer.html');
        ?>

    </body>
</html>