<?php
require_once '../Conf/Conf.php';

/**
 * Classe Model
 *
 * Cette classe implémente le modèle Singleton pour gérer la connexion à la base de données via PDO.
 *
 */
class Model {
    /**
     * Instance unique de la classe Model.
     *
     * @var Model|null
     */
    private static $instance;

    /**
     * Objet PDO pour la connexion à la base de données.
     *
     * @var PDO
     */
    private $pdo;


    /**
     * Constructeur privé pour empêcher l'instanciation directe.
     */
    private function __construct() {
        $login = Conf::getLogin();
        $hostname = Conf::getHostname();
        $databaseName = Conf::getDatabase();
        $password = Conf::getPassword();

        // Connexion à la base de données avec PDO
        $this->pdo = new PDO("mysql:host=$hostname;dbname=$databaseName", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        // Activation du mode d'affichage des erreurs et du lancement d'exception en cas d'erreur
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /**
     * Méthode statique pour obtenir l'instance unique de la classe Model.
     *
     * @return Model Instance unique de la classe Model.
     */
    public static function getInstance(): Model {
        if (self::$instance == NULL) {
            self::$instance = new Model();
        }
        return self::$instance;
    }


    /**
     * Méthode pour obtenir l'objet PDO associé à la connexion à la base de données.
     *
     * @return PDO Objet PDO pour la connexion à la base de données.
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }
}
?>
