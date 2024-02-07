<?php

require_once '../Model/ModelAPI.php';

/**
 * Classe ModelRecherche
 *
 * Cette classe représente un modèle pour effectuer des recherches et obtenir des données à partir de l'API TaxRef.
 *
 */
class ModelRecherche{
    /**
     * Les données obtenues à partir de l'API.
     *
     * @var array
     */
    private array $data;


    /**
     * Constructeur de la classe ModelRecherche.
     *
     * @param string $url L'URL de l'API à interroger.
     */
    public function __construct(String $url) {
        $this->data = $this->Recherche_Link($url);
    }
    

    /**
     * Obtient les données obtenues à partir de l'API.
     *
     * @return array|null Les données obtenues à partir de l'API, ou null si aucune donnée n'est présente.
     */
    public function getData(): ?array {
        return $this->data;
    }


    /**
     * Méthode privée pour effectuer la recherche à partir de l'API TaxRef.
     *
     * @param string $url L'URL de l'API à interroger.
     * @return array|null Les données obtenues à partir de l'API, ou null en cas d'erreur.
     */
    private static function Recherche_Link(string $url): ?array {
        try {
            return ModelAPI::Get_Link($url) ?: [];
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * Obtient les données de la page.
     *
     * @return array Les données de la page, ou un tableau vide si aucune donnée n'est présente.
     */
    public function GetPage(): array {
        return $this->data['page'] ?? [];
    }


    /**
     * Obtient les données des taxons.
     *
     * @return array Les données des taxa, ou un tableau vide si aucune donnée n'est présente.
     */
    public function GetTaxa() :array{
        return $this->data['_embedded']['taxa'] ?? [];
    }


    /**
     * Obtient les données des externalDb.
     *
     * @return array Les données des externalDb, ou un tableau vide si aucune donnée n'est présente.
     */
    public function GetexternalDb():array{
        return $this->data['_embedded']['externalDb'] ?? [];
    }
    

    /**
     * Obtient les données des media.
     *
     * @return array Les données des media, ou un tableau vide si aucune donnée n'est présente.
     */
    public function GetMedia() :array{
        return $this->data['_embedded']['media'] ?? [];
    }


    /**
     * Obtient les données des taxonSources.
     *
     * @return array Les données des taxonSources, ou un tableau vide si aucune donnée n'est présente.
     */
    public function GettaxonSources() :array{
        return $this->data['_embedded']['taxonSources'] ?? [];
    }


    /**
     * Obtient l'ID GBIF du taxon.
     *
     * @return int L'ID GBIF du taxon, ou 0 si non trouvé.
     */
    public function GetGbifID(): int{
        foreach($this->GetexternalDb() as $ExternalDb){
            if($ExternalDb['externalDbName']=='GBIF'){
                return $ExternalDb['externalId'];
            }
        }
        return 0;
    }


    /**
     * Obtient une option spécifique des données.
     *
     * @param string $option Le nom de l'option à récupérer.
     * @return string|null La valeur de l'option, ou null si l'option n'existe pas.
     */
    public function getOptionInData(String $option): ?string {return $this->data[$option] ?? NULL;}


    /**
     * Obtient les URLs des images associées à un taxon.
     *
     * @param ModelTaxon $taxon Le taxon pour lequel obtenir les images.
     * @param bool $color Indique s'il faut des images en couleur.
     * @param bool $demande Indique s'il faut effectuer une demande à l'API pour obtenir les images.
     * @return array Tableau contenant les URLs des images.
     */
    public static function getTaxonImageUrl(ModelTaxon $taxon,bool $color = true,bool $demande = true)  {
        $images=[];
        if ($demande){
            $imagedata = new ModelRecherche("https://taxref.mnhn.fr/api/taxa/" . $taxon->getId_taxon() . "/media");
            foreach ($imagedata->GetMedia() as $imagechoose) {
                if (isset($imagechoose['_links']['file']['href'])){
                    $images [] = $imagechoose['_links']['file']['href'];
                }
            }
        }
        if (empty($images)){
            if ($taxon->getregne() == null){
                return $images ?: ($color ? ["../Static/images/logo/Animalia.png"] : ["../Static/images/logo/Logo_BW_Temp.png"]);
            }
            return ["../Static/images/logo/" . $taxon->getregne() . ".png"];
        }
        return $images;
    }


    /**
     * Nettoie une chaîne d'entrée en supprimant les caractères spéciaux et les espaces inutiles.
     *
     * @param string|null $query La chaîne d'entrée à nettoyer.
     * @return string|null La chaîne nettoyée.
     */
    public static function cleanInput(?string $query): ?string {
        if ($query === null) {
            return null;
        }
        
        $dico = ',?;.:/!§ù%$£^¨=)°àç_*(\~#{[|`^@]}¤"&\'<>"';
        $query = str_replace(str_split($dico), '', $query);
        $dicoe='éèê';
        $query = str_replace(str_split($dicoe), 'e', $query);

        $cleaned_input = trim($query); // Supprimer les espaces inutiles en début et fin de chaîne
        $cleaned_input = htmlspecialchars($cleaned_input, ENT_QUOTES, 'UTF-8'); // Échapper les caractères spéciaux HTML
        $cleaned_input = htmlspecialchars($cleaned_input);

    
        return $cleaned_input;
    }
    

    /**
     * Génère un lien à partir d'options et éventuellement d'un taxon.
     *
     * @param array $options Les options pour le lien.
     * @param ModelTaxon|null $taxon Le taxon pour lequel générer le lien.
     * @return string Le lien généré.
     */
    public static function generateLink(array $options, ModelTaxon $taxon = null): string {
        $link = "";
            foreach ($options as $option) {
                $link .= $option . ",";
            }
            if ($taxon != null) {
               
                $link .= $taxon->getScientificName() . '+' . $taxon->getId_Taxon();
            } else {
                // Enlève la dernière virgule si elle existe
                $link = rtrim($link, ',');
            }
        return $link;
    }
    

    /**
     * Obtient un tableau de données à partir d'un lien formaté.
     *
     * @param string $link Le lien formaté.
     * @return array Le tableau de données.
     */
    public static function GetFormatLink(string $link): array{
        $data = [];
        $selection = explode(',', $link);
        foreach ($selection as $item) {
            list($nom, $id) = explode('+',   $item);
            $data[] = ['id' => $id, 'nom' => $nom];
        }
        return $data;
    }
    

    /**
     * Obtient les descendants d'un taxon selon une classe biologique et un nom spécifiés.
     *
     * @param string $classb La classe biologique actuel qu'on veut la descendence.
     * @param string $nom Le nom du taxon.
     * @return array Tableau contenant les descendants sous forme de ModelTaxon.
     */
    public function getDescendants(string $classb,string $nom): array {
        $descendants = [];
        foreach ($this->GetTaxa() as $taxon) {
            if ($taxon[$classb] == $nom) {
                $descendants[] = ModelTaxon::construire($taxon);
            }
        }
        return $descendants;
    }


    /**
     * Obtient des informations sur l'habitat à partir du numéro d'habitat.
     *
     * @return ModelRecherche Le modèle contenant les informations sur l'habitat.
     */
    public function getInfoHabitat(): ModelRecherche{
        $numhabitat=$this->getOptionInData('habitat');
        return new ModelRecherche("https://taxref.mnhn.fr/api/habitats/$numhabitat");
    }


    /**
     * Obtient les informations bibliographiques pour un taxon donné.
     *
     * @param int $idTaxon L'identifiant du taxon.
     * @return array Tableau contenant les informations bibliographiques.
     */
    public static function GetInfoBibliographique(int $idTaxon): array{
        return (new ModelRecherche("https://taxref.mnhn.fr/api/taxa/$idTaxon/sources"))->GettaxonSources();
    }


    /**
     * Supprime les synonymes des taxons et renvoie un tableau de ModelTaxon sans synonymes.
     *
     * @return array Tableau de ModelTaxon sans les synonymes.
     */
    public function removeSynonyme() :array {
        $dataWithoutSynonym = [];
        foreach ($this->GetTaxa() as $taxon) {
            if ($taxon['parentId'] != null) {
                $dataWithoutSynonym[] = ModelTaxon::construire($taxon);
            }
        }
        return $dataWithoutSynonym;
    }


    /**
     * Obtient un tableau de ModelTaxon à partir des données du modèle.
     *
     * @return array Tableau de ModelTaxon.
     */
    public function DataOfModelTaxon(): array{
        $data_taxon =[];
        $taxon = $this->getData();
        $data_taxon [] = ModelTaxon::construire($taxon);
        return $data_taxon;
    }


    /**
     * Obtient un tableau de ModelTaxon à partir des données multiples du modèle.
     *
     * @return array Tableau de ModelTaxon.
     */
    public function DataOfMULTIModelTaxon(): array{
        $dataTaxon = [];
        foreach ($this->GetTaxa() as $taxon) {
                $dataTaxon[] = ModelTaxon::construire($taxon);
            }
        return $dataTaxon;
    }


    /**
     * Obtient le nom correspondant à la langue spécifiée.
     *
     * @param string|null $lang La langue pour laquelle obtenir le nom.
     * @return string Le nom correspondant à la langue.
     */
    public static function obtainNameOfLang(string $lang = null): string {
        $langueConvert = [
            'FR' => 'frenchVernacularName',
            'EN' => 'englishVernacularName',
            'SC' => 'scientificName'
        ];
    
        $langueChoisis = $langueConvert[$lang] ?? 'scientificName';
    
        return $langueChoisis;
    }


    /**
     * Obtient les références externes d'un taxon à partir de son identifiant.
     *
     * @param int $idTaxon L'identifiant du taxon.
     * @return array Tableau contenant les références externes du taxon.
     */
    public static function GetExternalRef(int $idTaxon): array{
        $data= new ModelRecherche("https://taxref.mnhn.fr/api/taxa/$idTaxon/externalIds");
        return $data->GetexternalDb();
    }


    /**
     * Obtient des suggestions de taxons à partir d'un nom vernaculaire.
     *
     * @param string $vernecularname Le nom vernaculaire pour lequel obtenir des suggestions.
     * @return array Tableau de suggestions de ModelTaxon.
     */
    public static function ObtenirSuggestion(string $vernecularname): array{
        $data_Suggestion= new ModelRecherche("https://taxref.mnhn.fr/api/taxa/search?taxonomicRanks=ES&vernacularGroups=" . $vernecularname . "&page=1&size=20");
        return array_slice($data_Suggestion->removeSynonyme(true), 0, 4);
    }


    /**
     * Vérifie si le modèle de recherche est vide.
     *
     * @return bool True si le modèle est vide, sinon false.
     */
    public function isEmpty(): bool {
        return empty($this->data);
    }


    /**
     * Obtient la classification d'un taxon à partir de son identifiant.
     *
     * @param int $idTaxon L'identifiant du taxon.
     * @return array Tableau contenant la classification du taxon.
     */
    public static function ObtenirClassification(int $idTaxon): array{
        $data = new ModelRecherche("https://taxref.mnhn.fr/api/taxa/$idTaxon/classification");
        foreach ($data->GetTaxa() as $taxon) {
            $result[$taxon["rankId"]] = $taxon["fullNameHtml"];
        }
        return $result;

    }


    /**
     * Filtre les données de présence en fonction des clés spécifiées.
     *
     * @return array Tableau contenant les données de présence filtrées.
     */
    function filterArrayPrésence(): array{
        $resultArray = array();
        $keysToInclude = array(
            'fr', 'gf', 'mar', 'gua', 'sm', 'sb', 'spm', 'may', 'epa', 'reu', 'sa', 'ta', 'nc', 'wf', 'pf', 'cli'
        );
        foreach ($keysToInclude as $key) {
            if ($this->getOptionInData($key)!==NULL) {
                $resultArray[$key] = $this->getOptionInData($key);
            }
        }
        return $resultArray;
    }
    

    /**
     * Convertit une abréviation en son nom complet correspondant.
     *
     * @param string $Abréviation L'abréviation à convertir.
     * @return string Le nom complet correspondant à l'abréviation.
     */
    public static function ConvertirNomAbréviation(string $Abréviation): string {
        $conversionMap = array(
            'fr' => 'France métropolitaine',
            'gf' => 'Guyane française',
            'mar' => 'Maroc',
            'gua' => 'Guadeloupe',
            'sm' => 'Saint-Marin',
            'sb' => 'Îles Salomon',
            'spm' => 'Saint-Pierre-et-Miquelon',
            'may' => 'Mayotte',
            'epa' => 'Établissements français dans le Pacifique',
            'reu' => 'Réunion',
            'sa' => 'Arabie saoudite',
            'ta' => 'Tunisie',
            'nc' => 'Nouvelle-Calédonie',
            'wf' => 'Wallis-et-Futuna',
            'pf' => 'Polynésie française',
            'cli' => 'Îles Clipperton'
        );
        return isset($conversionMap[$Abréviation]) ? $conversionMap[$Abréviation] : $Abréviation;
    }


    /**
     * Convertit un statut de présence en son libellé complet correspondant.
     *
     * @param string $Abréviation Le statut de présence à convertir.
     * @return string Le libellé complet correspondant au statut de présence.
     */
    public static function ConvertirStatutPrésence(string $Abréviation): string{
        $conversionMap = array(
            'P' => 'Présente (indigène ou indéterminé), présent au sens large dans la zone géographique',
            'E' => 'Endémique, naturellement restreint à la zone géographique considérée',
            'S' => 'Subendémique, naturellement restreint à une zone un peu plus grande que la zone géographique',
            'C' => 'Cryptogène, dont l’aire d’origine est inconnue',
            'I' => 'Introduite, dont la présence dans la zone géographique est due à une intervention humaine',
            'J' => 'Introduite envahissante, introduit et naturalisé/établi dans la zone géographique considérée',
            'M' => 'Introduite non établie(dont cultivée ou domestique)',
            'B' => 'Occasionnelle, migrateur de passage ou observé de manière exceptionnelle',
            'D' => 'Douteux, Taxon dont la présence dans la zone géographique considérée n’est pas avérée',
            'Q' => 'Signalé par erreur',
            'A' => 'Absente, non présent dans la zone géographique ',
            'W' => 'Disparue, n’est plus présent à l’état sauvage dans la zone géographique',
            'X' => 'Eteinte, Taxon globalement éteint',
            'Z' => 'Endémique éteinte, Taxon endémique et aujourd’hui disparu',
            'Y' => 'Introduite éteinte, introduit par le passé mais aujourd’hui disparu de la zone géographique'
        );
        return isset($conversionMap[$Abréviation]) ? $conversionMap[$Abréviation] : $Abréviation;
    }
}

?>