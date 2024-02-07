<?php
/**
 * Classe ModelAPI
 *
 * Cette classe propose des méthodes pour effectuer des requêtes à une API.
 *
 */
class ModelAPI{
    /**
     * Effectue une requête GET à l'API et retourne les données sous forme de tableau associatif.
     *
     * @param string $url L'URL de l'API.
     * @return array Les données de la réponse de l'API.
     */
    static function Get_Link(string $url) : array {
        try {
            // Envoi de la requête GET à l'API
            $response = @file_get_contents($url);
            if ($response === false) {
                throw new Exception('Échec de la requête à l\'API TaxRef');
            }
            
            // Vérifier si le code de réponse est 404 (Not Found)
            $http_response_code = $http_response_header[0];
            if (strpos($http_response_code, '404') !== false) {
                throw new Exception('Erreur 404 demande API');
            }
            // Décodez la réponse JSON en un tableau associatif
            $data = json_decode($response, true);
            if ($data === null || json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Erreur lors du décodage de la réponse JSON');
            }
            return $data;
        } catch (Exception $e) {
            return [];
        }
    }

    
    /**
     * Effectue une requête à l'API un nombre spécifié de fois et retourne le temps moyen d'exécution.
     *
     * @param string $url L'URL de l'API.
     * @param int $number Le nombre d'itérations à effectuer.
     * @return float Le temps moyen d'exécution en secondes.
     */
    static function Obtain_time(string $url, int $number): float {
        try {
            if ($number <= 0) {
                throw new InvalidArgumentException("Le nombre d'itérations doit être positif.");
            }
            $total_time = 0;
            for ($i = 0; $i < $number; $i++) {
                $start_time = microtime(true);
                ModelAPI::Get_Link($url);
                $total_time += microtime(true) - $start_time;
            }
            return $total_time / $number;
        } catch (Exception $e) {
            return 0;
        }
    }
}
?>
