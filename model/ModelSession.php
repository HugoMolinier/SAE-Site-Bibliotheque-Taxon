<?php

/**
 * Classe Session
 *
 * Cette classe offre une interface pour gérer les sessions en PHP.
 *
 */
class Session {
    /**
     * Instance unique de la classe Session.
     *
     * @var Session|null
     */
    private static ?Session $instance = null;


    /**
     * Constructeur privé pour empêcher l'instanciation directe.
     * Démarre une nouvelle session PHP.
     *
     * @throws Exception Si la session n'a pas réussi à démarrer.
     */
    private function __construct() {
        $sessionStarted = session_start();
        if (!$sessionStarted) {
            throw new Exception("La session n'a pas réussi à démarrer.");
        }
    }


    /**
     * Méthode statique pour obtenir l'instance unique de la classe Session.
     *
     * @return Session Instance unique de la classe Session.
     */
    public static function getInstance(): Session {
        if (is_null(static::$instance)) {
            static::$instance = new Session();
        }
        return static::$instance;
    }


    /**
     * Vérifie si une variable de session existe avec le nom spécifié.
     *
     * @param string $name Le nom de la variable de session.
     * @return bool True si la variable de session existe, sinon False.
     */
    public function contient(string $name): bool {
        return isset($_SESSION[$name]);
    }


    /**
     * Enregistre une variable de session avec le nom et la valeur spécifiés.
     *
     * @param string $name Le nom de la variable de session.
     * @param mixed $value La valeur à enregistrer dans la variable de session.
     * @return void
     */
    public function enregistrer(string $name, mixed $value): void {
        $_SESSION[$name] = $value;
    }


    /**
     * Lit la valeur de la variable de session avec le nom spécifié.
     *
     * @param string $name Le nom de la variable de session.
     * @return mixed La valeur de la variable de session, ou null si elle n'existe pas.
     */
    public function lire(string $name): mixed {
        return $this->contient($name) ? $_SESSION[$name] : null;
    }


    /**
     * Supprime la variable de session avec le nom spécifié.
     *
     * @param string $name Le nom de la variable de session à supprimer.
     * @return void
     */
    public function supprimer(string $name): void {
        if ($this->contient($name)) {
            unset($_SESSION[$name]);
        }
    }


    /**
     * Détruit la session en cours.
     * Supprime toutes les données de session et détruit le cookie de session.
     *
     * @return void
     */
    public function detruire(): void {
        session_unset(); // unset $_SESSION variable for the run-time
        session_destroy(); // destroy session data in storage
        Cookie::supprimer(session_name()); // supprime le cookie de session

        // Il faudra reconstruire la session au prochain appel de getInstance
        static::$instance = null;
    }
}
?>
