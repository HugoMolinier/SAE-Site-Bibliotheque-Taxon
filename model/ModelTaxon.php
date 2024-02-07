<?php
require_once 'Model.php';

/**
 * La classe ModelTaxon représente un taxon avec ses caractéristiques.
 */
class ModelTaxon{
    private int $id;
    private string $scientificName;
    private string $frenchVernacularName;
    private string $englishVernacularName;
    private string $regne;
    private string $authority;
    private string $date_ajout;
    private int $id_utilisateur;
    private string $note;
    private string $image;
    
    
    /**
     * Constructeur de la classe ModelTaxon.
     *
     * @param int $id L'identifiant du taxon.
     * @param string $scientificName Le nom scientifique du taxon.
     * @param string $frenchVernacularName Le nom vernaculaire en français.
     * @param string $englishVernacularName Le nom vernaculaire en anglais.
     * @param string $regne Le règne du taxon.
     * @param string $authority L'autorité taxonomique du taxon.
     * @param string $date_ajout La date d'ajout du taxon.
     * @param int $id_utilisateur L'identifiant de l'utilisateur associé au taxon.
     * @param string $note La note associée au taxon.
     * @param string $image Le chemin de l'image associée au taxon.
     */
    public function __construct(
        int $id,
        string $scientificName,
        string $frenchVernacularName,
        string $englishVernacularName,
        string $regne,
        string $authority = '',
        string $date_ajout = '',
        int $id_utilisateur = 0,
        string $note = '',
        string $image = ''
        
        
    ) {
        $this->id = $id;
        $this->scientificName = $scientificName;
        $this->frenchVernacularName = $frenchVernacularName;
        $this->englishVernacularName = $englishVernacularName;
        $this->regne = $regne;
        $this->authority = $authority;
        $this->date_ajout = $date_ajout;
        $this->id_utilisateur = $id_utilisateur;
        $this->note = $note;
        $this->image = $image ;
    }

    
    /**
     * Obtient l'identifiant du taxon.
     *
     * @return int L'identifiant du taxon.
     */
    public function getId_taxon(): int {
        return $this->id;
    }

    /**
     * Obtient l'autorité taxonomique du taxon.
     *
     * @return string L'autorité taxonomique du taxon.
     */
    public function getAuthority(): string {
        return $this->authority;
    }

    /**
     * Obtient le nom scientifique du taxon.
     *
     * @return string Le nom scientifique du taxon.
     */
    public function getscientificName(): string {
        return $this->scientificName;
    }

    /**
     * Obtient le règne du taxon.
     *
     * @return string Le règne du taxon.
     */
    public function getregne():string{
        return $this->regne;
    }

    /**
     * Obtient le nom vernaculaire en français du taxon.
     *
     * @return string|null Le nom vernaculaire en français du taxon ou null s'il n'existe pas.
     */
    public function getfrenchVernacularName(): ?string {
        return $this->frenchVernacularName;
    }

    /**
     * Obtient le nom vernaculaire en anglais du taxon.
     *
     * @return string|null Le nom vernaculaire en anglais du taxon ou null s'il n'existe pas.
     */
    public function getenglishVernacularName(): ?string {
        return $this->englishVernacularName;
    }

    /**
     * Obtient la date d'ajout du taxon.
     *
     * @return string La date d'ajout du taxon.
     */
    public function getDate_ajout(): string {
        return $this->date_ajout;
    }
    
    /**
     * Obtient le chemin de l'image associée au taxon.
     *
     * @return string|null Le chemin de l'image associée au taxon ou null s'il n'y a pas d'image.
     */
    public function getImage(): ?string {
        return $this->image;
    }

    /**
     * Obtient la note associée au taxon.
     *
     * @return string|null La note associée au taxon ou null s'il n'y a pas de note.
     */
    public function getnote(): ?string{
        return $this->$note;
    }

    /**
     * Obtient l'identifiant de l'utilisateur associé au taxon.
     *
     * @return int L'identifiant de l'utilisateur associé au taxon.
     */
    public function getId_utilisateur(): int{
        return $this->id_utilisateur;
    }

    /**
     * Définit la note associée au taxon.
     *
     * @param string|null $note La note à associer au taxon.
     */
    public function setNote(?string $note): void {
        $this->note = $note;
    }

    /**
     * Définit l'identifiant de l'utilisateur associé au taxon.
     *
     * @param int $idUtilisateur L'identifiant de l'utilisateur à associer au taxon.
     */
    public function setIdUtilisateur(int $idUtilisateur): void {
        $this->id_utilisateur = $idUtilisateur;
    }
    

    /**
     * Ajoute un taxon à la base de données.
     *
     * @param int $idTaxon L'identifiant du taxon.
     * @param string $scientificName Le nom scientifique du taxon.
     * @param string $frenchVernacularName Le nom vernaculaire en français.
     * @param string $englishVernacularName Le nom vernaculaire en anglais.
     * @param string $regne Le règne du taxon.
     * @param string $authority L'autorité taxonomique du taxon.
     * @param int $idUtilisateur L'identifiant de l'utilisateur associé au taxon.
     * @return bool True si l'ajout est réussi, sinon false.
     */
    public static function ajouter(int $idTaxon, string $scientificName,?string $frenchVernacularName,?string $englishVernacularName,string $regne,string $authority, int $idUtilisateur):bool{
        try {
            $sql = "INSERT INTO taxon_enregistrer (id, scientificName,frenchVernacularName,englishVernacularName,kingdomName,authority, date_ajout, id_utilisateur) VALUES (:idTaxon, :scientificName,:frenchVernacularName,:englishVernacularName,:kingdomName,:authority,:date_ajout, :idUtilisateur)";
            $model = Model::getInstance();
            $pdoStatement = $model->getPdo()->prepare($sql);
            $values = array(
                ':idTaxon' => $idTaxon,
                ':scientificName' => $scientificName,
                ':frenchVernacularName' => $frenchVernacularName,
                ':englishVernacularName' => $englishVernacularName,
                ':kingdomName' => $regne,
                ':authority' => $authority,
                ':date_ajout' => date('Y-m-d H:i:s'),
                ':idUtilisateur' => $idUtilisateur
            );
            // On donne les valeurs et on exécute la requête
            $pdoStatement->execute($values);
    
            // Si l'insertion s'est bien passée, retournez true
            return true;
        } catch (PDOException $e) {
            // Gérer l'exception (par exemple, en affichant un message d'erreur)
            return false; // Retournez false en cas d'erreur
        }
        
    }


     /**
     * Vérifie le statut d'enregistrement d'un taxon par un utilisateur.
     *
     * @param int $id_taxon L'identifiant du taxon.
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     * @return bool True si le taxon est enregistré par l'utilisateur, sinon false.
     */
    public static function StatutOfTaxon(int $id_taxon,int $id_utilisateur):bool{
        $sql = "SELECT * from taxon_enregistrer WHERE id = :id_taxon AND id_utilisateur = :id_utilisateur";
        // Préparation de la requête
        $model = Model::getInstance();
        $pdoStatement = $model->getPdo()->prepare($sql);
        $values = array(
            ':id_taxon' => $id_taxon,
            'id_utilisateur' => $id_utilisateur);
        $pdoStatement->execute($values);
        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas de taxon correspondante
        $taxons_enregistrer = $pdoStatement->fetch();
        if (!$taxons_enregistrer){
            return false;
        }
        return true;

    }

    /**
     * Construit un objet ModelTaxon à partir d'un tableau de données de taxon.
     *
     * @param array $taxon Le tableau de données du taxon.
     * @return ModelTaxon L'objet ModelTaxon construit.
     */
    public static function construire(array $taxon) : ModelTaxon {
        return new ModelTaxon($taxon['id'],$taxon['scientificName'],$taxon['frenchVernacularName'] ?? '',$taxon['englishVernacularName'] ?? '',$taxon['kingdomName'] ?? '',$taxon['authority'] ?? '');
    }


    /**
     * Obtient un taxon enregistré à partir de son identifiant et de l'identifiant de l'utilisateur.
     *
     * @param int $id_taxon L'identifiant du taxon.
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     * @return ModelTaxon|null Le taxon enregistré ou null s'il n'existe pas.
     */
    public static function getTaxon_enregistrer(int $id_taxon,int $id_utilisateur) : ?ModelTaxon  {
        $sql = "SELECT * from taxon_enregistrer WHERE id = :id_taxon AND id_utilisateur = :id_utilisateur";
        // Préparation de la requête
        $model = Model::getInstance();
        $pdoStatement = $model->getPdo()->prepare($sql);
        $values = array(
            ':id_taxon' => $id_taxon,
            'id_utilisateur' => $id_utilisateur);
        // On donne les valeurs et on exécute la requête
        $pdoStatement->execute($values);
        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas de voiture correspondante
        $taxons_enregistrer = $pdoStatement->fetch();
        if (!$taxons_enregistrer){
            return NULL;
        }
        return static::construire($taxons_enregistrer);
    }


    /**
     * Supprime un taxon enregistré de la base de données.
     *
     * @param int $id_taxon L'identifiant du taxon.
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     * @return bool True si la suppression est réussie, sinon false.
     */
    public static function supprimer(int $id_taxon,int $id_utilisateur): bool{
        try {
            $sql = "DELETE FROM taxon_enregistrer WHERE id = :id_taxon AND id_utilisateur = :id_utilisateur";
            $model = Model::getInstance();
            $pdoStatement = $model->getPdo()->prepare($sql);
            $values = array(
            ':id_taxon' => $id_taxon,
            'id_utilisateur' => $id_utilisateur);
            $pdoStatement->execute($values);
            // Si la suppression s'est bien passée, retournez true
            return true;
        } catch (PDOException $e) {
            // Gérer l'exception (par exemple, en affichant un message d'erreur)
            // Log ou autre traitement d'erreur
            return false; // Retournez false en cas d'erreur
        }
    }


    /**
     * Vérifie si le nom vernaculaire associé au taxon est non NULL, sinon renvoie le nom scientifique.
     *
     * @param object $taxon L'objet du taxon.
     * @param string $langueChoisis La langue pour laquelle obtenir le nom.
     * @return string Le nom vernaculaire ou scientifique du taxon.
     */
    public static function verifierNomNotNULL(ModelTaxon $taxon, string $langueChoisis): string {
        $vernacularName = $taxon->{'get' . $langueChoisis}();
        return $vernacularName ? $vernacularName : $taxon->getScientificName();
    }


    /**
     * Remplace la note associée au taxon pour un utilisateur donné.
     *
     * @param string $note La nouvelle note à associer au taxon.
     * @param int $idutilisateur L'identifiant de l'utilisateur.
     * @return bool True si la mise à jour est réussie, sinon false.
     */
    public function RemplacerNote(string $note,int $idutilisateur): bool{
        try {
            if(!($this->StatutOfTaxon($this->getId_taxon(),$idutilisateur))){
                $resultat = Self::ajouter($this->getId_taxon(), $this->getscientificName(), $this->getfrenchVernacularName(), $this->getenglishVernacularName(), $this->getregne(), $this->getAuthority(), $idutilisateur);
            }
            $sql = "UPDATE taxon_enregistrer SET note = :note WHERE id = :idtaxon AND id_utilisateur = :idutilisateur";
            $model = Model::getInstance();
            $pdoStatement = $model->getPdo()->prepare($sql);
            $values = array(
                ':note' => $note,
                ':idtaxon' => $this->getId_taxon(),
                'idutilisateur' => $idutilisateur);

            $pdoStatement->execute($values);
            return true;
        
        }catch (PDOException $e) {
            return false;
        }
    }


    /**
     * Obtient la note associée au taxon pour un utilisateur donné.
     *
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     * @return string|bool La note associée au taxon ou false s'il n'y a pas de note.
     */
    public function obtenirNote(int $id_utilisateur): ?string{
        $sql = "SELECT note from taxon_enregistrer WHERE id = :id_taxon AND id_utilisateur = :id_utilisateur";
        $model = Model::getInstance();
        $pdoStatement = $model->getPdo()->prepare($sql);
        $values = array(
            ':id_taxon' => $this->getId_taxon(),
            'id_utilisateur' => $id_utilisateur);
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        return isset($result['note']) ? $result['note'] : false;

    }
}

?>