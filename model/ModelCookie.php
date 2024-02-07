<?php

/**
 * Classe Cookie
 *
 * Cette classe offre des méthodes statiques pour gérer les cookies en PHP.
 *
 */
class Cookie{
    /**
     * Enregistre un cookie avec une clé, une valeur, et éventuellement une durée d'expiration.
     *
     * @param string $cle La clé du cookie.
     * @param string $valeur La valeur associée à la clé du cookie.
     * @param int|null $dureeExpiration La durée d'expiration en secondes (facultative).
     *                                  Si non spécifiée, le cookie expirera à la fin de la session.
     * @return void
     */
    public static function enregistrer(string $cle, string $valeur, ?int $dureeExpiration = null): void
    {
        if ($dureeExpiration !== null) {
            $expire = time() + $dureeExpiration;
        } else {
            $expire = 0; // Expire à la fin de la session
        }

        setcookie($cle, (string)$valeur, $expire, '/');
    }


    /**
     * Lit la valeur associée à la clé d'un cookie.
     *
     * @param string $cle La clé du cookie.
     * @return string|null La valeur associée à la clé du cookie, ou null si le cookie n'existe pas.
     */
    public static function lire(string $cle): ?string
    {
        if (self::contient($cle)) {
            return $_COOKIE[$cle];
        }
        return null;
    }


    /**
     * Vérifie si un cookie existe avec la clé spécifiée.
     *
     * @param string $cle La clé du cookie.
     * @return bool True si le cookie existe, sinon False.
     */
    public static function contient(string $cle): bool
    {
        return isset($_COOKIE[$cle]);
    }


    /**
     * Supprime un cookie avec la clé spécifiée.
     *
     * @param string $cle La clé du cookie à supprimer.
     * @return void
     */
    public static function supprimer(string $cle): void
    {
        if (self::contient($cle)) {
            // Pour supprimer un cookie, définissez la date d'expiration dans le passé
            setcookie($cle, '', time() - 3600, '/');
        }
    }
}
