<?php
require '../model/connectBD.php';
require '../composants/head.php';
require('../composants/header.php');
?>

<h1>
    Modifier un jardin
</h1>

<?php
$jardin_id = $_GET['jardins'];

$query = "SELECT * FROM jardins WHERE jardin_id = '" . $jardin_id . "'";
$req = $bd->query($query);
$jardin = $req->fetch();
?>

<form action="verifModifJardinUser.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="jardin_id" value="<?php echo $jardin['jardin_id'] ?>">
    <div>
        <label for="jardin_nom">Nom du jardin</label>
        <input type="text" name="jardin_nom" id="jardin_nom" value="<?php echo $jardin['jardin_nom'] ?>">
    </div>
    <div>
        <label for="jardin_adr">Adresse du jardin</label>
        <input type="text" name="jardin_adr" id="jardin_adr" value="<?php echo $jardin['jardin_adr'] ?>">
    </div>
    <div>
        <label for="jardin_coordLat">Coordonnée Latitude</label>
        <input type="text" name="jardin_coordLat" id="jardin_coordLat" value="<?php echo $jardin['jardin_coordLat'] ?>">
    </div>
    <div>
        <label for="jardin_coordLong">Coordonnée Longitude</label>
        <input type="text" name="jardin_coordLong" id="jardin_coordLong" value="<?php echo $jardin['jardin_coordLong'] ?>">
    </div>
    <div>
        <label for="jardin_surface">Surface du jardin</label>
        <input type="text" name="jardin_surface" id="jardin_surface" value="<?php echo $jardin['jardin_surface'] ?>">
    </div>
    <div>
        <label for="jardin_infoTerre">Type de terre</label>
        <input type="text" name="jardin_infoTerre" id="jardin_infoTerre" value="<?php echo $jardin['jardin_infoTerre'] ?>">
    </div>
    <div>
        <label for="jardin_photo_actuel">Photo actuel</label>
        <img name="jardin_photo_actuel" id="jardin_photo_actuel" src="/src/assets/uploads/<?php echo $jardin['jardin_photo']?>">
    </div>
    <div>
        <label for="jardin_photo">Photo du jardin</label>
        <input type="file" name="jardin_photo" id="jardin_photo">
    </div>
    <div>
        <input type="submit" value="Modifier">
    </div>
</form>

<?php require('../composants/footer.php') ?>