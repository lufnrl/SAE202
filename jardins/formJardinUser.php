<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';
?>

<h1>
    Ajouter un jardin
</h1>

<form action="ajoutJardinUser.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="jardin_nom">Nom du jardin</label>
        <input type="text" name="jardin_nom" id="jardin_nom">
    </div>
    <div>
        <label for="jardin_surface">Surface du jardin</label>
        <input type="number" name="jardin_surface" id="jardin_surface">
    </div>
    <div>
        <label for="jardin_nbParcelles">Nombre de parcelles</label>
        <input type="number" name="jardin_nbParcelles" id="jardin_nbParcelles">
    </div>
    <div>
        <label for="jardin_adr">Adresse du jardin</label>
        <input type="text" name="jardin_adr" id="jardin_adr">
    </div>
    <div>
        <label for="jardin_ville">Ville du jardin</label>
        <input type="text" name="jardin_ville" id="jardin_ville">
    </div>
    <div>
        <label for="jardin_coordLat">Coordonnées latitude du jardin</label>
        <input type="text" name="jardin_coordLat" id="jardin_coordLat">
    </div>
    <div>
        <label for="jardin_coordLong">Coordonnées longitude du jardin</label>
        <input type="text" name="jardin_coordLong" id="jardin_coordLong">
    </div>
    <div>
        <label for="jardin_photo">Photo du jardin</label>
        <input type="file" name="jardin_photo" id="jardin_photo">
    </div>
    <div>
        <label for="jardin_maps">Lien Google Maps du jardin</label>
        <input type="text" name="jardin_maps" id="jardin_maps">
    </div>
    <div>
        <label for="jardin_infoTerre">Informations sur la terre du jardin</label>
        <input type="text" name="jardin_infoTerre" id="jardin_infoTerre">
    </div>
    <div>
        <input type="submit" value="Ajouter">
    </div>
</form>