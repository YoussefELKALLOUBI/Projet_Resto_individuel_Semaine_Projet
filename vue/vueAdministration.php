<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1> Gestion Types Cuisine & Utilisateurs</h1>
Mon adresse électronique : <?= $util->getMailU() ?> <br />
Mon pseudo : <?= $util->getPseudoU() ?> <br />
<hr>
<form action="./?action=administration" method="POST">
    Les types de cuisine : <br />
    <?php
    for ($i = 0; $i < count($lesTypesCuisine); $i++) {
        $typeCuisine = $lesTypesCuisine[$i];
        ?>
        <input type="checkbox" name="lstTypeCuisine[]" id="allTypeCuisine<?= $i ?>" value="<?= $typeCuisine->getIdTC() ?>" >
        <label for="typeCuisine<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $typeCuisine->getLibelleTC() ?></li></label><br />
    <?php } ?>
    <input type="submit" value="Supprimer" />
    <input type="submit" value="Actualiser ↺" />

    <br /><br />
    <hr>

    Ajouter un type de cuisine : <br />
    <input type="text" name="addTC" placeholder="Nouveau Type Cuisine" /><br />
    <input type="submit" value="Ajouter" />
    <hr>

    Les utilisateurs : <br />
    <?php
    for ($i = 0; $i < count($Users); $i++) {
        $user = $Users[$i];
        ?>
        <input type="checkbox" name="ListUsers[]" id="allUsers<?= $i ?>" value="<?= $user->getIdU() ?>" >
        <label for="allUsers<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $user->getMailU() ?></li></label><br />
            <?php } ?>
    <input type="submit" value="Supprimer" />
    <input type="submit" value="Actualiser ↺" />

    <br /><br />
    <hr>
</form>

