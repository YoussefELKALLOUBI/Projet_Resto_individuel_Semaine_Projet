<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/** @var string $nomR nom du restaurant recherché */
/** @var string $villeR nom du restaurant recherché */
/** @var string $cpR nom du restaurant recherché */
/** @var string $voieAdrR nom du restaurant recherché */
?>
Gestion des restaurants 
Mon adresse électronique : <?= $util->getMailU() ?> <br />
Mon pseudo : <?= $util->getPseudoU() ?> <br />
<hr>
<form action="./?action=gestionRestaurants" method="POST">  
    <h1> Gestion des restaurants : </h1>
    <h2> Suppression des restaurants : </h2><br />
    <?php
    for ($i = 0; $i < count($lesRestos); $i++) {
        $resto = $lesRestos[$i];
        ?>
        <input type="checkbox" name="ListRestos[]" id="allRestos<?= $i ?>" value="<?= $resto->getIdR() ?>" >
        <label for="allRestos<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $resto->getNomR() ?></li></label><br />
             
    <?php } ?>
    <input type="submit" value="Supprimer" />
    <input type="submit" value="Actualiser ↺" />
    <br /><br />
    <hr> 
    <h2> Ajout des restaurants : </h2> 
    <label> Nom du restaurant : </label>
    <input type="text" name="nomR" ><br/>
    <label> Numéro de voie  : </label>

    <input type="text" name="numAdrR" > <br/>
    <label> Adresse : </label>

    <input type="text" name="voieAdrR"> <br/>
    <label> Ville : </label>

    <input type="text" name="villeR" > <br/>
    <label> Code Postal : </label>

    <input type="text" name="cpR"> <br/>

    <label> description </label>

    <input type="text" name="descR"> <br/>

    <input type="submit" value="Ajouter" />
    <input type="submit" value="Actualiser ↺" />
</form>
<hr>  
<form>
<h2> Modification des restaurants : </h2> 
<?php
foreach ($lesRestos as $unResto) {
    ?>
    <div class="card">
        <div class="photoCard">
            <?php
            $lesPhotos = $unResto->getLesPhotos();
            if (count($lesPhotos) > 0) {
                $laPhotoPrincipale = $lesPhotos[0];
                ?>
                <img src="photos/<?= $laPhotoPrincipale->getCheminP() ?>" alt="photo du restaurant" />
            <?php } ?>

        </div>
        <div class="descrCard">
            <a href="./?action=detail&idR=<?= $unResto->getIdR() ?>"><?= $unResto->getNomR() ?></a>

            <br />
            <?= $unResto->getNumAdr() ?>
            <?= $unResto->getVoieAdr() ?>
            <br />
            <?= $unResto->getCpR() ?>
            <?= $unResto->getVilleR() ?>
        </div>
        <div class="descrCard"><a href="./?action=modifierResto&idR=<?= $unResto->getIdR() ?>"> Modifier </a></div>
        <div class="tagCard">            
            <ul id="tagFood">		
                <?php
                foreach ($unResto->getLesTypesCuisineProposes() as $unTC) {
                    ?>
                    <li class="tag"><span class="tag">#</span><?= $unTC->getLibelleTC() ?></li>
                    <?php }
                    ?>
            </ul>
        </div>
    </div>
    <?php
}
?>

</form>


