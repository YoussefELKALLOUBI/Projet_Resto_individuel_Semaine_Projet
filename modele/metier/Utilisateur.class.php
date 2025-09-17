<?php

namespace modele\metier;

/**
 * Description of Utilisateur
 * Données relatives à un utilisateur du site resto
 * @author N. Bourgeois
 * @version 07/2021
 */
class Utilisateur {

    /** @var int identifiant, valeur auto-incrémentée dans la BDD  */
    private int $idU;

    /** @var string adresse de courrier électronique */
    private string $mailU;

    /** @var string mot de passe chiffré */
    private ?string $mdpU;

    /** @var string pseudonyme */
    private ?string $pseudoU;
    private bool $adminU;

    /** @var array tableau<TypesCuisine> liste des types de cuisine préférés par l'utilisateur */
    private array $lesTypesCuisinePreferes;

    /** @var array tableau<Resto> : liste des restaurants "aimés" par l'utilisateur */
    private array $lesRestosAimes;

    function __construct(int $idU, string $mailU, ?string $mdpU, ?string $pseudoU, bool $adminU) {
        $this->idU = $idU;
        $this->mailU = $mailU;
        $this->mdpU = $mdpU;
        $this->pseudoU = $pseudoU;
        $this->adminU = $adminU;
        $this->lesTypesCuisinePreferes = array();
        $this->lesRestosAimes = array();
    }

    public function __toString() {
        return get_class() . "{id=" . $this->idU . ", mail=" . $this->mailU . " ,mdp=" . $this->mdpU . " ,pseudo=" . $this->pseudoU . ", ... }";
    }

    function getIdU(): int {
        return $this->idU;
    }

    function getMailU(): string {
        return $this->mailU;
    }

    function getMdpU(): ?string {
        return $this->mdpU;
    }

    function getPseudoU(): ?string {
        return $this->pseudoU;
    }

    function getLesTypesCuisinePreferes(): array {
        return $this->lesTypesCuisinePreferes;
    }

    function getLesRestosAimes(): array {
        return $this->lesRestosAimes;
    }

    function setIdU(int $idU): void {
        $this->idU = $idU;
    }

    function setMailU(string $mailU): void {
        $this->mailU = $mailU;
    }

    function setMdpU(string $mdpU): void {
        $this->mdpU = $mdpU;
    }

    function setPseudoU(string $pseudoU): void {
        $this->pseudoU = $pseudoU;
    }

    function setLesTypesCuisinePreferes(array $lesTC): void {
        $this->lesTypesCuisinePreferes = $lesTC;
    }

    function setLesRestosAimes(array $lesRestosAimes): void {
        $this->lesRestosAimes = $lesRestosAimes;
    }

    function getAdminU(): bool {
        return $this->adminU;
    }

    function setAdminU(bool $adminU): void {
        $this->adminU = $adminU;
    }

}
