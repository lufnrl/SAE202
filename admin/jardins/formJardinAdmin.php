<?php
$titre = 'Ajouter un jardin';
$desc = 'Page d\'ajout d\'un jardin utilisateur';
session_start();
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';
?>

<h1>Ajouter un jardin</h1>

<div class="profile-edit-container">
    <form action="ajoutJardinAdmin.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="jardin_nom">Nom du jardin</label>
            <input type="text" name="jardin_nom" id="jardin_nom" required>
        </div>
        <div class="form-group">
            <label for="jardin-desc">Description du jardin</label>
            <textarea name="jardin_desc" id="jardin-desc" required></textarea>
        </div>
        <div class="form-group">
            <label for="jardin_surface">Surface du jardin</label>
            <input type="number" name="jardin_surface" id="jardin_surface" required>
        </div>
        <div class="form-group">
            <label for="jardin_nbParcelles">Nombre de parcelles</label>
            <input type="number" name="jardin_nbParcelles" id="jardin_nbParcelles" required>
        </div>
        <div class="form-group">
            <label for="jardin_adr">Adresse du jardin</label>
            <input type="text" name="jardin_adr" id="jardin_adr" required>
        </div>
        <div class="form-group">
            <label for="jardin_ville">Ville du jardin</label>
            <input type="text" name="jardin_ville" id="jardin_ville" required>
        </div>
        <div class="form-group">
            <label for="jardin_coordLat">Coordonnées latitude du jardin</label>
            <input type="text" name="jardin_coordLat" id="jardin_coordLat" required>
        </div>
        <div class="form-group">
            <label for="jardin_coordLong">Coordonnées longitude du jardin</label>
            <input type="text" name="jardin_coordLong" id="jardin_coordLong" required>
        </div>
        <div class="form-group">
            <label for="jardin_photo">Photo du jardin</label>
            <input type="file" name="jardin_photo" id="jardin_photo">
        </div>
        <div class="form-group">
            <label for="jardin_maps">Lien Google Maps du jardin</label>
            <input type="text" name="jardin_maps" id="jardin_maps" required>
        </div>
        <div class="form-group">
            <label for="jardin_infoTerre">Informations sur la terre du jardin</label>
            <input type="text" name="jardin_infoTerre" id="jardin_infoTerre" required>
        </div>
        <div>
            <label for="_user_id">Le propriétaire</label>
<select name="_user_id" id="_user_id" required>
                <?php
                $query = "SELECT * FROM users";
                $req = $bd->query($query);
                while ($user = $req->fetch()) {
                    echo '<option value="' . $user['user_id'] . '">' . $user['user_nom'] . ' ' . $user['user_prnm'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Ajouter">
            <a class="btn-back" href="/admin/jardins/tableJardins.php">Retour</a>
        </div>
    </form>
</div>
