<?php

use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;
use \modele\dao\TypeCuisineDAO;
use \modele\dao\PrefererDAO;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Construction de la vue
$titre = "Administration";
if (isLoggedOn()) {
    Bdd::connecter();
    $menuBurger = array();
    $menuBurger[] = Array("url" => "./?action=profil", "label" => "Consulter mon profil");
    $menuBurger[] = Array("url" => "./?action=updProfil", "label" => "Modifier mon profil");
    if (isAdmin()) {
        $menuBurger = array();
        $menuBurger[] = Array("url" => "./?action=profil", "label" => "Consulter mon profil");
        $menuBurger[] = Array("url" => "./?action=updProfil", "label" => "Modifier mon profil");
        $menuBurger[] = Array("url" => "./?action=administration", "label" => "Administration : Gestion TypeCuisine & Users");
        $menuBurger[] = Array("url" => "./?action=gestionRestaurants", "label" => "Gestion des restaurants ");

        // Si un utilisateur est connecté
        // Données spécifiques à la page vueAdministration
        $idU = getIdULoggedOn();
        $mailU = getMailULoggedOn();
        $util = UtilisateurDAO::getOneById($idU);
        $mesRestosAimes = $util->getLesRestosAimes();
        //tous les utilisateurs
        $allUsers = UtilisateurDAO::getAll();
        //$mesTypeCuisinePreferes = $util->getLesTypesCuisinePreferes();
        $lesTypesCuisine = \modele\dao\TypeCuisineDAO::getAll();
        $Users = \modele\dao\UtilisateurDAO::getAll();
        // Construction de la vue
        require_once "$racine/vue/entete.html.php";
        require_once "$racine/vue/vueAdministration.php";
    } else {
        // Si un aucun utilisateur n'est connecté
        // Construction de la vue
        ajouterMessage("Admin : l'utilisateur n'est pas admin");
        require_once "$racine/vue/entete.html.php";
        require_once "$racine/vue/pied.html.php";
    }
} else {
    // Si un aucun utilisateur n'est connecté
    // Construction de la vue
    ajouterMessage("Profil : aucun utilisateur n'est connecté");
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/pied.html.php";
}

// Types de cuisine à supprimer de liste des types de cuisine 
if (isset($_POST["lstTypeCuisine"])) {
    $delLstidTC = $_POST["lstTypeCuisine"];
    for ($i = 0; $i < count($delLstidTC); $i++) {
        TypeCuisineDAO::deleteOneTC($delLstidTC[$i]);
    }
}
// Ajout de l'objet Type Cuisisne $typCuisine en fonction des saisies
// Nouveau TC
$addTC = "";
if (isset($_POST["addTC"])) {
    $addTC = $_POST["addTC"];
    if ($addTC != "") {
        TypeCuisineDAO::addTC($addTC);
    }
}
// liste des utilisateurs à supprimer 
if (isset($_POST["ListUsers"])) {
    $delListUsers = $_POST["ListUsers"];
    for ($i = 0; $i < count($delListUsers); $i++) {
        UtilisateurDAO::deleteUser($delListUsers[$i]);
    }
}
?>