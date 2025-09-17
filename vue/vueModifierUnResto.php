<?php ?>
<form action="./?action=modifierResto&idR=<?= $idResto ?>" method="POST">

    <h1> Modification du restaurant : <?php echo $NomResto; ?> </h1>


    <h3 id="Nom"> Nom du restaurant : </h3>
    <input type="text" name="NomR" value="<?php echo $NomResto ?>"><br/>

    <h3 id="Adresse"> Adresse du restaurant : </h3>
    <label> Numéro de voie  : </label>

    <input type="text" name="numVoieAdrR" value=<?php echo $numAdrResto ?>> <br/>
    <label> La voie : </label>

    <input type="text" name="voieAdrR"  maxlength="30" value="<?php echo $voieAdrResto ?>"> <br/>
    <label> Ville : </label>

    <input type="text" name="VilleR" value="<?php echo $villeResto ?>"> <br/>
    <label> Code Postal : </label>

    <input type="text" name="cprR" value="<?php echo $NomCPReso ?>"> <br/>

    <h3 id="description"> Description du restaurant : </h3>
    <label> Description : </label>

    <input type="text" name="descriptionR" value="<?php echo $descriptionR ?>"> <br/>

    <hr>

    <input align="center" type="submit" value="Modifier" style="width:200px; border:1px solid ;position: absolute;
           right: 0px;
           "/><br/><br/>

    <h3 id="Horaires">
        Horaires
    </h3> 

    les horaires actuelles :
    <?= $HorairesR ?>
    <br>
    modifier les horaires actuelles :
    <br>
    <textarea rows = "28" cols = "60" name = "horairesR">
        <?= $HorairesR ?>
    </textarea><br>    
    <hr>
    <input align="center" type="submit" value="Modifier" style="width:200px; border:1px solid ;position: absolute;
           right: 0px;
           "/>

</form>