<?php

use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;
use \modele\dao\TypeCuisineDAO;
use \modele\dao\PrefererDAO;
use \modele\dao\restoDAO;
use modele\metier\Resto;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Construction de la vue
$titre = "gestionRestaurants";
if (isLoggedOn()) {
    Bdd::connecter();
    $menuBurger = array();
    $menuBurger[] = Array("url" => "./?action=profil", "label" => "Consulter mon profil");
    $menuBurger[] = Array("url" => "./?action=updProfil", "label" => "Modifier mon profil");
    if (isAdmin()) {
        $menuBurger[] = Array("url" => "./?action=administration", "label" => "Administration: types cuisine & utilisateurs");
        $menuBurger[] = Array("url" => "./?action=gestionRestaurants", "label" => "Gestion des restaurants ");
        $lesTypesCuisine = \modele\dao\TypeCuisineDAO::getAll();
        $Users = \modele\dao\UtilisateurDAO::getAll();
        $lesRestos = \modele\dao\restoDAO::getAll();
        $idU = getIdULoggedOn();
        $util = UtilisateurDAO::getOneById($idU);
        // Construction de la vue
        require_once "$racine/vue/entete.html.php";
        require_once "$racine/vue/vueGestionRestaurants.php";
    } else {
        // Si un aucun utilisateur n'est connecté
        // Construction de la vue
        ajouterMessage("Admin : l'utilisateur n'est pas admin");
        require_once "$racine/vue/entete.html.php";
        require_once "$racine/vue/pied.html.php";
    }

    // Si un utilisateur est connecté
    // Données spécifiques à la page vueAdministration
    $idU = getIdULoggedOn();
    $mailU = getMailULoggedOn();
    $util = UtilisateurDAO::getOneById($idU);
    //$mesRestosAimes = $util->getLesRestosAimes();
    // Construction de la vue
    require_once "$racine/vue/entete.html.php";
} else {
    // Si un aucun utilisateur n'est connecté
    // Construction de la vue
    ajouterMessage("Profil : aucun utilisateur n'est connecté");
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/pied.html.php";
}
// liste des restos à supprimer 
if (isset($_POST["ListRestos"])) {
    if ($_POST["ListRestos"]!=null){
            $delListRestos = $_POST["ListRestos"];
            for ($i = 0; $i < count($delListRestos); $i++) {
                RestoDAO::deleteResto($delListRestos[$i]);
            }
    }
}

//insertResto
if (isset($_POST["nomR"], $_POST["numAdrR"], $_POST["voieAdrR"], $_POST["cpR"], $_POST["villeR"], $_POST["descR"])) {
    if ($_POST["nomR"] != null && $_POST["numAdrR"] != null && $_POST["voieAdrR"] != null && $_POST["cpR"] != null && $_POST["villeR"] != null && $_POST["descR"] != null) {
        $unResto = new Resto(0, $_POST["nomR"], $_POST["numAdrR"], $_POST["voieAdrR"], $_POST["cpR"],
                $_POST["villeR"], 0, 0, $_POST["descR"], null);
        RestoDAO::insertResto($unResto);
    }
}
?>
