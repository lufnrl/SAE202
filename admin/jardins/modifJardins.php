<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require('../../composants/header.php');

$req = $bd->query("SELECT * FROM jardins WHERE jardin_id = '" . $_GET['jardins'] . "'");
$jardins = $req->fetch();

?>

<h1>Modifier un jardin</h1>

<div>
    <form action="verifModifJardins.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="jardin_id" value="<?php echo $_GET['jardins'] ?>">
        </div>
        <!-- photo du jardin actuel -->
        <div>
            <label for="jardin_photo">Photo actuelle du jardin</label>
            <img src="/src/assets/uploads/<?php echo $jardins['jardin_photo'] ?>" alt="Photo du jardin" style="width:100px;">
        </div>
        <!-- changer photo du jardin -->
        <div>
            <label for="jardin_photo">Photo du jardin</label>
            <input type="file" name="jardin_photo" id="jardin_photo" value="<?php echo $jardins['jardin_photo'] ?>">
        </div>
        <div>
            <label for="jardin_nom">Nom du jardin</label>
            <input type="text" name="jardin_nom" id="jardin_nom" value="<?php echo $jardins['jardin_nom'] ?>">
        </div>
        <div>
            <label for="jardin_surface">Surface du jardin</label>
            <input type="text" name="jardin_surface" id="jardin_surface" value="<?php echo $jardins['jardin_surface'] ?>">
        </div>
        <div>
            <label for="jardin_adr">Adresse du jardin</label>
            <input type="text" name="jardin_adr" id="jardin_adr" value="<?php echo $jardins['jardin_adr'] ?>">
        </div>
        <div>
            <label for="jardin_ville">Ville du jardin</label>
            <input type="text" name="jardin_ville" id="jardin_ville" value="<?php echo $jardins['jardin_ville'] ?>">
        </div>
        <div>
            <label for="jardin_coordLat">Coordonnée Latitude du jardin</label>
            <input type="text" name="jardin_coordLat" id="jardin_coordLat" value="<?php echo $jardins['jardin_coordLat'] ?>">
        </div>
        <div>
            <label for="jardin_coordLong">Coordonnée Longitude du jardin</label>
            <input type="text" name="jardin_coordLong" id="jardin_coordLong" value="<?php echo $jardins['jardin_coordLong'] ?>">
        </div>
        <div>
            <label for="jardin_maps">Lien Google Maps du jardin</label>
            <input type="text" name="jardin_maps" id="jardin_maps" value="<?php echo $jardins['jardin_maps'] ?>">
        </div>
        <div>
            <label for="jardin_infoTerre">Info Terre du jardin</label>
            <input type="text" name="jardin_infoTerre" id="jardin_infoTerre" value="<?php echo $jardins['jardin_infoTerre'] ?>">
        </div>

        <div>
            <input type="submit" value="Modifier">
            <a href="tableJardins.php">Retour</a>
        </div>
    </form>
</div>

<?php
require('../../composants/footer.php');
?>