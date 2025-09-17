<?php

use modele\dao\Bdd;
use modele\dao\RestoDAO;
use modele\metier\Resto;
use modele\dao\UtilisateurDAO;
use modele\dao\TypeCuisineDAO;

Bdd::connecter();
$unResto = RestoDAO::getOneById($_GET["idR"]);

$menuBurger = array();
$menuBurger[] = Array("url" => "#top", "label" => " modifier le nom");
$menuBurger[] = Array("url" => "#Adresse", "label" => "modifier l'adresse");
$menuBurger[] = Array("url" => "#description", "label" => "modifier la description");
$menuBurger[] = Array("url" => "#horaires", "label" => "modifier les horaires");
$menuBurger[] = Array("url" => "#TypeCuisine", "label" => "modifier les types de cuisine");

if (!isset($_GET["idR"])) {

    // Pb : pas d'id de restaurant
    ajouterMessage("Modifier un restaurat : il faut fournir un identifiant de restaurant");
    $titre = "erreur";
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/pied.html.php";
} else {

    $titre = "ça marche";
    $idR = intval($_GET["idR"]);
    $unResto = RestoDAO::getOneById($idR);

    if (is_null($unResto)) {
        // Pb : pas de restaurant pour cet id
        ajouterMessage("Détail resto : restaurant non trouvé");
        $titre = "erreur";
        require_once "$racine/vue/entete.html.php";
        require_once "$racine/vue/pied.html.php";
    } else {

        $idResto = $unResto->getIdR();
        $NomResto = $unResto->getNomR();
        $numAdrResto = $unResto->getNumAdr();
        $voieAdrResto = $unResto->getVoieAdr();
        $villeResto = $unResto->getVilleR();
        $NomCPReso = $unResto->getCpR();
        $descriptionR = $unResto->getDescR();
        $HorairesR = $unResto->getHorairesR();
        $lesTypesCuisineProposes = $unResto->getLesTypesCuisineProposes();
        $lesTypesCuisine = \modele\dao\TypeCuisineDAO::getAll();
    }
}

if (isset($_POST["NomR"]) && isset($_POST["numVoieAdrR"]) && isset($_POST["voieAdrR"]) && isset($_POST["VilleR"]) && isset($_POST["cprR"]) && isset($_POST["horairesR"])) {
    // Si la saisie a été effectuée
    if ($_POST["NomR"] != "" && $_POST["numVoieAdrR"] != "" && $_POST["voieAdrR"] != "" && $_POST["VilleR"] != "" && $_POST["cprR"] != "" && $_POST["horairesR"] != "") {
        // Si tous les champs sont renseignés
        $unResto->setNomR($_POST["NomR"]);
        $unResto->setNumAdr($_POST["numVoieAdrR"]);
        $unResto->setVoieAdr($_POST["voieAdrR"]);
        $unResto->setVilleR($_POST["VilleR"]);
        $unResto->setCpR($_POST["cprR"]);
        $unResto->setHorairesR($_POST["horairesR"]);
        $unResto->setDescR($_POST["descriptionR"]);
        $ret = RestoDAO::update($unResto);

        if ($ret) {
            echo("Modif  : Réussi.");

            //header('Location: ./?action=modifierUnResto');// modifierlesrestoadmin
            include_once "$racine/vue/entete.html.php";
        } else {
            ajouterMessage("Modif  : Raté.");
        }
    } else {
        ajouterMessage("Modification restaurant : renseigner tous les champs...");
    }
}
// Types de cuisine à supprimer de liste des types de cuisine 
//if (isset($_POST["lstTypeCuisine"])) {
//    $delLstidTC = $_POST["lstTypeCuisine"];
//    for ($i = 0; $i < count($delLstidTC); $i++) {
//        modele\dao\ProposerDAO::delete($idResto,$delLstidTC[$i]);
//    }
//}
// Ajout de l'objet Type Cuisisne $typCuisine en fonction des saisies
//if (isset($_POST["addTC"])) {
//    $delLstidTC = $_POST["addTC"];
//    for ($i = 0; $i < count($delLstidTC); $i++) {
//        modele\dao\ProposerDAO::insert($idResto,$addTC[$i]);
//    }
//}

if (isLoggedOn()) {
    if (isAdmin()) {
        include_once "$racine/vue/entete.html.php";
        include_once "$racine/vue/vueModifierUnResto.php";
        include_once "$racine/vue/pied.html.php";
    } else {
        include_once "$racine/vue/entete.html.php";
        include_once "$racine/vue/pied.html.php";
        echo "Admin : l'utilisateur n'est pas admin";
    }
} else {
    include_once "$racine/vue/entete.html.php";
    echo 'utilisateur non connecté';
}
