<?php

namespace modele\dao;

use modele\dao\Bdd;
use PDO;
use PDOException;
use Exception;

/**
 * Description of PrefererDAO
 *
 * @author N. Bourgeois
 * @version 07/2021
 */
class ProposerDAO {

    /**
     * @param int $idTC identifiant du type de cuisine préféré
     * @return bool true si l'opération réussit, false sinon
     * @throws Exception transmission des erreurs PDO éventuelles
     */
    public static function insert(int $idR, int $idTC): bool {
        $resultat = false;
        try {
            $stmt = Bdd::getConnexion()->prepare("INSERT INTO proposer p (idTC, idR) VALUES(:idTC,:idR)"
                    . "INNER JOIN resto r ON  r.idR = r.idR"
                    . "INNER JOIN typeCuisine tc ON  tc.idTC = r.idTC");

            $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
            $stmt->bindParam(':idTC', $idTC, PDO::PARAM_INT);
            $resultat = $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::insert : <br/>" . $e->getMessage());
        }
        return $resultat;
    }

    /**
     * Suppimer un couple (idR, idTC) de la table proposer
     * @param int $idTC identifiant du type de cuisine
     * @return bool true si l'opération réussit, false sinon
     * @throws Exception transmission des erreurs PDO éventuelles
     */
    public static function delete(int $idR, int $idTC): bool {
        $resultat = false;
        try {
            $stmt = Bdd::getConnexion()->prepare("DELETE FROM proposer WHERE idTC=:idTC and idR=:idR");
            $stmt->bindParam(':idTC', $idTC, PDO::PARAM_INT);
            $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
            $resultat = $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::delete : <br/>" . $e->getMessage());
        }
        return $resultat;
    }

}
