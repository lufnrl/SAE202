<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

require '../composants/head.php';
require '../composants/header.php';
?>

<h1>Ajouter un jardin</h1>

<div class="profile-edit-container">
    <form action="ajoutJardinUser.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="jardin_nom">Nom du jardin</label>
            <input type="text" name="jardin_nom" id="jardin_nom">
        </div>
        <div class="form-group">
            <label for="jardin_surface">Surface du jardin</label>
            <input type="number" name="jardin_surface" id="jardin_surface">
        </div>
        <div class="form-group">
            <label for="jardin_nbParcelles">Nombre de parcelles</label>
            <input type="number" name="jardin_nbParcelles" id="jardin_nbParcelles">
        </div>
        <div class="form-group">
            <label for="jardin_adr">Adresse du jardin</label>
            <input type="text" name="jardin_adr" id="jardin_adr">
        </div>
        <div class="form-group">
            <label for="jardin_ville">Ville du jardin</label>
            <input type="text" name="jardin_ville" id="jardin_ville">
        </div>
        <div class="form-group">
            <label for="jardin_coordLat">Coordonnées latitude du jardin</label>
            <input type="text" name="jardin_coordLat" id="jardin_coordLat">
        </div>
        <div class="form-group">
            <label for="jardin_coordLong">Coordonnées longitude du jardin</label>
            <input type="text" name="jardin_coordLong" id="jardin_coordLong">
        </div>
        <div class="form-group">
            <label for="jardin_photo">Photo du jardin</label>
            <input type="file" name="jardin_photo" id="jardin_photo">
        </div>
        <div class="form-group">
            <label for="jardin_maps">Lien Google Maps du jardin</label>
            <input type="text" name="jardin_maps" id="jardin_maps">
        </div>
        <div class="form-group">
            <label for="jardin_infoTerre">Informations sur la terre du jardin</label>
            <input type="text" name="jardin_infoTerre" id="jardin_infoTerre">
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Ajouter">
            <a class="btn-back" href="../users/compte.php">Retour</a>
        </div>
    </form>
</div>
