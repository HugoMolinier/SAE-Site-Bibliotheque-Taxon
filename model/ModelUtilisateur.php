<?php
require_once 'Model.php';

/**
 * La classe ModelUtilisateur représente un utilisateur avec ses caractéristiques.
 */
class ModelUtilisateur{
    private int $id;
    private string $pseudo;
    private string $email;
    private string $mdp_haché;
    private string $IsAdmin;
    private string $date_inscription;
    private string $pdp_photo;

    /**
     * Constructeur de la classe ModelUtilisateur.
     *
     * @param int $id L'identifiant de l'utilisateur.
     * @param string $pseudo Le pseudo de l'utilisateur.
     * @param string $email L'adresse e-mail de l'utilisateur.
     * @param string $date_inscription La date d'inscription de l'utilisateur.
     * @param bool $IsAdmin Indique si l'utilisateur est administrateur (true) ou non (false).
     */
    public function __construct(
        int $id,
        string $nom,
        string $email,
        string $date_inscription,
        bool $IsAdmin
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->date_inscription = $date_inscription;
        $this->IsAdmin = $IsAdmin;
    }

    /**
     * Obtient l'identifiant de l'utilisateur.
     *
     * @return int L'identifiant de l'utilisateur.
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * Obtient le pseudo de l'utilisateur.
     *
     * @return string Le pseudo de l'utilisateur.
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * Obtient l'adresse e-mail de l'utilisateur.
     *
     * @return string L'adresse e-mail de l'utilisateur.
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Obtient la date d'inscription de l'utilisateur.
     *
     * @return string La date d'inscription de l'utilisateur.
     */
    public function getDateInscription(): string {
        return $this->date_inscription;
    }

    /**
     * Obtient le mot de passe haché de l'utilisateur.
     *
     * @return string Le mot de passe haché de l'utilisateur.
     */
    public function getMotDePasse(): string {
        return $this->mot_de_passe;
    }

    /**
     * Obtient le statut administrateur de l'utilisateur.
     *
     * @return bool True si l'utilisateur est administrateur, sinon false.
     */
    public function getIsAdmin(): bool {
        return $this->IsAdmin;
    }


    /**
     * Inscrit un nouvel utilisateur.
     *
     * @param string $pseudo Le pseudo de l'utilisateur.
     * @param string $email L'adresse e-mail de l'utilisateur.
     * @param string $mot_de_passe Le mot de passe de l'utilisateur.
     * @param string $IsAdmin Indique si l'utilisateur est administrateur (true) ou non (false).
     * @return bool True si l'inscription est réussie, sinon false.
     */
    public static function inscrireUtilisateur(string $pseudo, string $email, string $mot_de_passe, string $IsAdmin = '0'): bool {
        try {
            date_default_timezone_set('Europe/Paris'); // Définir le fuseau horaire français
            $date_creation = date("Y/m/d", strtotime("+2 hours")); // Date de création avec 2 heures de plus
            $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

            $sql = "INSERT INTO utilisateur (pseudo, mail, mot_de_passe,IsAdmin, date_inscription) VALUES (:pseudo, :mail, :mot_de_passe,:IsAdmin , :date_inscription)";
            $model = Model::getInstance();
            $pdoStatement = $model->getPdo()->prepare($sql);
            $values = array(
                ':pseudo' => $pseudo,
                ':mail' => $email,
                ':mot_de_passe' => $mot_de_passe_hash,
                ':IsAdmin' => $IsAdmin,
                ':date_inscription' => $date_creation
            );
            $pdoStatement->execute($values);
            return true;
        } catch (PDOException $e) {
            // Gérer l'exception (par exemple, en affichant un message d'erreur)
            // Log ou autre traitement d'erreur
            return false;
        }
    }


    /**
     * Obtient un utilisateur par son adresse e-mail.
     *
     * @param string $email L'adresse e-mail de l'utilisateur à rechercher.
     * @return ModelUtilisateur|null L'utilisateur trouvé ou null s'il n'existe pas.
     */
    public static function obtenirUtilisateurParMail(string $email): ?ModelUtilisateur {
        $model = Model::getInstance();
        $check_email_statement = $model->getPdo()->prepare("SELECT id, pseudo, mail, date_inscription , IsAdmin FROM utilisateur WHERE mail = :mail");
        $check_email_statement->bindParam(':mail', $email);
        $check_email_statement->execute();
        $row = $check_email_statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new ModelUtilisateur($row['id'], $row['pseudo'], $row['mail'],$row['date_inscription'], $row['IsAdmin']);
        } else {
            return null; // Utilisateur non trouvé
        }
    }


    /**
     * Enregistre l'utilisateur dans la session après connexion.
     *
     * @param string $email L'adresse e-mail de l'utilisateur connecté.
     */
    public static function EnregistrerUtilisateurDansSession(string $email): void {
        $user = ModelUtilisateur::obtenirUtilisateurParMail($email);
        // Initialisez la session
        $session = Session::getInstance();
        $session->enregistrer('id',$user->getId());
        $session->enregistrer('nom', $user->getNom());
        $session->enregistrer('mail', $user->getEmail());
        $session->enregistrer('IsAdmin', $user->getIsAdmin()); 
    }


    /**
     * Obtient un utilisateur par son identifiant.
     *
     * @param int $id_utilisateur L'identifiant de l'utilisateur à rechercher.
     * @return ModelUtilisateur|null L'utilisateur trouvé ou null s'il n'existe pas.
     */
    public static function obtenirUtilisateurParID(int $id_utilisateur): ?ModelUtilisateur {
        $model = Model::getInstance();
        $check_email_statement = $model->getPdo()->prepare("SELECT id, pseudo, mail, date_inscription , IsAdmin FROM utilisateur WHERE id = :id_utilisateur");
        $check_email_statement->bindParam(':id_utilisateur', $id_utilisateur);
        $check_email_statement->execute();
        $row = $check_email_statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new ModelUtilisateur($row['id'], $row['pseudo'], $row['mail'],$row['date_inscription'], $row['IsAdmin']);
        } else {
            return null; // Utilisateur non trouvé
        }
    }


     /**
     * Vérifie l'existence d'un utilisateur par son adresse e-mail.
     *
     * @param string $email L'adresse e-mail de l'utilisateur à vérifier.
     * @return bool True si l'utilisateur existe, sinon false.
     */
    public static function verifierExistanceUtilisateur(string $email): bool {
        $model = Model::getInstance();
        
        // Vérifiez l'adresse mail unique
        $check_email_statement = $model->getPdo()->prepare("SELECT mail FROM utilisateur WHERE mail = :mail");
        $check_email_statement->bindParam(':mail', $email);
        $check_email_statement->execute();
        
        // Vérifiez si des résultats sont renvoyés
        $result = $check_email_statement->fetch(PDO::FETCH_ASSOC);
        
        return !empty($result);
    }


    /**
     * Authentifie un utilisateur en vérifiant l'adresse e-mail et le mot de passe.
     *
     * @param string $email L'adresse e-mail de l'utilisateur.
     * @param string $mot_de_passe Le mot de passe de l'utilisateur.
     * @return bool True si l'authentification est réussie, sinon false.
     */
    public static function Connexion_Utilisateur(string $email, string $mot_de_passe): bool {
        $model = Model::getInstance();
        $sql = "SELECT id,pseudo, mail, mot_de_passe, IsAdmin FROM utilisateur WHERE mail = :mail";
        $pdoStatement = $model->getPdo()->prepare($sql);
        $values = array(
            ':mail' => $email
        );
        $pdoStatement->execute($values);
        // Utilisez fetch() pour obtenir la première ligne de résultats
        if ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $pseudo = $row['pseudo'];
            $mail_db = $row['mail'];
            $mot_de_passe_db = $row['mot_de_passe'];
            $IsAdmin = $row['IsAdmin'];
    
            if (password_verify($mot_de_passe, $mot_de_passe_db)) {
                return true;
            } else {
                echo 'mot de passe non similaire';
            }
        } else {
            echo " ereur row";
        }

    }


    /**
     * Obtient la liste de tous les membres avec le nombre d'espèces enregistrées.
     *
     * @param bool $collection_vide Indique si la collection doit inclure uniquement les utilisateurs avec des espèces enregistrées.
     * @param string $query La chaîne de recherche pour filtrer les utilisateurs par pseudo.
     * @param string $ordre_nombre_éspèce L'ordre de tri pour le nombre d'espèces (ASC ou DESC).
     * @param string $ordre_alphabétique L'ordre de tri alphabétique (ASC ou DESC).
     * @return array La liste des utilisateurs avec le nombre d'espèces enregistrées.
     */
    public static function obtenirTousLesMembres(bool $collection_vide = false, string $query = "", string $ordre_nombre_éspèce = "DESC", string $ordre_alphabétique = 'ASC'): array {
        $model = Model::getInstance();
        // Validate sorting order
        $allowedOrders = ['ASC', 'DESC'];
        $ordre_nombre_éspèce = in_array(strtoupper($ordre_nombre_éspèce), $allowedOrders) ? strtoupper($ordre_nombre_éspèce) : 'ASC';
        $ordre_alphabétique = in_array(strtoupper($ordre_alphabétique), $allowedOrders) ? strtoupper($ordre_alphabétique) : 'ASC';
        // Select columns from utilisateur and count of species for each user
        $sql = "SELECT utilisateur.*, COUNT(taxon_enregistrer.id) AS nombre_especes
                FROM utilisateur
                LEFT JOIN taxon_enregistrer ON utilisateur.id = taxon_enregistrer.id_utilisateur";
        $sql .= " WHERE 1";
        if (!empty($query)) {
            $sql .= " AND utilisateur.pseudo LIKE :query";
        }
        if ($collection_vide) {
            $sql .= " AND EXISTS (SELECT 1 FROM taxon_enregistrer WHERE utilisateur.id = taxon_enregistrer.id_utilisateur)";
        }
        $sql .= " GROUP BY utilisateur.id
                  ORDER BY";
        // Add sorting conditions based on parameters
        $sql .= " nombre_especes $ordre_nombre_éspèce, utilisateur.pseudo $ordre_alphabétique";
        $pdoStatement = $model->getPdo()->prepare($sql);
        // Bind query parameter if it's used
        if (!empty($query)) {
            $pdoStatement->bindValue(':query', "%" . $query . "%");
        }
        $pdoStatement->execute();
        $membres = array();
        while ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $pseudo = $row['pseudo'];
            $mail = $row['mail'];
            $date_inscription = $row['date_inscription'];
            $IsAdmin = $row['IsAdmin'];
            $nombre_especes = $row['nombre_especes'];
            $membres[] = new ModelUtilisateur($id, $pseudo, $mail, $date_inscription, $IsAdmin, $nombre_especes);
        }
        return $membres;
    }
    

    /**
     * Obtient la liste des taxons enregistrés par l'utilisateur.
     *
     * @param string $langue La langue pour laquelle obtenir le nom des taxons.
     * @param string $ordre_alphabétique L'ordre de tri alphabétique (ASC ou DESC).
     * @param string $ordre_Date L'ordre de tri pour la date d'ajout (ASC ou DESC).
     * @return array La liste des taxons enregistrés par l'utilisateur.
     */
    public function ObtenirTaxonEnregistrer(string $langue, string $ordre_alphabétique = 'ASC', string $ordre_Date = 'ASC'): array {
            $model = Model::getInstance();
            $sql = "SELECT id,scientificName,frenchVernacularName,englishVernacularName,kingdomName,authority,date_ajout,id_utilisateur ,note ,image FROM taxon_enregistrer WHERE id_utilisateur = :id ORDER BY date_ajout $ordre_Date,$langue $ordre_alphabétique ";
            $pdoStatement = $model->getPdo()->prepare($sql);
            $values = array(':id' => $this->id);
            $pdoStatement->execute($values);
            $taxons= [];
            while ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
                $taxons[] = ModelTaxon::construire($row);
                
            }
            
            return $taxons;
    }
    

    /**
     * Obtient le nombre d'espèces enregistrées par l'utilisateur.
     *
     * @return int Le nombre d'espèces enregistrées par l'utilisateur.
     */
    public function NombreEspece_Utilisateur(): int {
        $model = Model::getInstance();
        
        $sql = "SELECT count(*) FROM taxon_enregistrer Where id_utilisateur = :id";
        $pdoStatement = $model->getPdo()->prepare($sql);
        $values = array(
            ':id' => $this->id
        );
        $pdoStatement->execute($values);
        return $pdoStatement->fetch(PDO::FETCH_ASSOC)['count(*)'];

    }

     /**
     * Obtient la date de la dernière modification d'un utilisateur.
     *
     * @return string|null La date de la dernière modification ou null s'il n'y en a pas.
     */
    public function GetLastModification(): ?string {
        try {
             $model = Model::getInstance();
            $sql = "SELECT date_ajout FROM taxon_enregistrer WHERE id_utilisateur = :id_utilisateur ORDER BY date_ajout DESC LIMIT 1";
            $pdoStatement = $model->getPdo()->prepare($sql);
            $values = array(':id_utilisateur' => $this->getId());
            $pdoStatement->execute($values);
            $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['date_ajout'];
            } else {
                return null; // User not found or no modification date available
            }
        } catch (PDOException $e) {
                // Handle the exception (e.g., log the error)
            return $e;
        }
    }
        
        
}
        


