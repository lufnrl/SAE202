<?php
session_start();
require '../../model/connectBD.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

require '../../composants/head.php';
require '../../composants/header.php';

$jardin_id = $_GET['jardins'];

$query = "SELECT * FROM jardins WHERE jardin_id = :jardin_id";
$req = $bd->prepare($query);
$req->execute(['jardin_id' => $jardin_id]);
$jardin = $req->fetch();

?>

<h1>Modifier un jardin</h1>

<div class="profile-edit-container">
    <form action="verifModifJardins.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="jardin_id" value="<?php echo htmlspecialchars($jardin_id); ?>">
        </div>
        <div class="form-group">
            <label for="jardin_photo">Photo actuelle du jardin</label>
            <img src="/src/assets/uploads/<?php echo htmlspecialchars($jardin['jardin_photo']); ?>" alt="Photo du jardin" style="width:100px;">
        </div>
        <div class="form-group">
            <label for="jardin_photo">Photo du jardin</label>
            <input type="file" name="jardin_photo" id="jardin_photo">
        </div>
        <div class="form-group">
            <label for="jardin_nom">Nom du jardin</label>
            <input type="text" name="jardin_nom" id="jardin_nom" value="<?php echo htmlspecialchars($jardin['jardin_nom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_surface">Surface du jardin</label>
            <input type="text" name="jardin_surface" id="jardin_surface" value="<?php echo htmlspecialchars($jardin['jardin_surface']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_adr">Adresse du jardin</label>
            <input type="text" name="jardin_adr" id="jardin_adr" value="<?php echo htmlspecialchars($jardin['jardin_adr']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_ville">Ville du jardin</label>
            <input type="text" name="jardin_ville" id="jardin_ville" value="<?php echo htmlspecialchars($jardin['jardin_ville']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_coordLat">Coordonnée Latitude du jardin</label>
            <input type="text" name="jardin_coordLat" id="jardin_coordLat" value="<?php echo htmlspecialchars($jardin['jardin_coordLat']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_coordLong">Coordonnée Longitude du jardin</label>
            <input type="text" name="jardin_coordLong" id="jardin_coordLong" value="<?php echo htmlspecialchars($jardin['jardin_coordLong']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_maps">Lien Google Maps du jardin</label>
            <input type="text" name="jardin_maps" id="jardin_maps" value="<?php echo htmlspecialchars($jardin['jardin_maps']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jardin_infoTerre">Info Terre du jardin</label>
            <input type="text" name="jardin_infoTerre" id="jardin_infoTerre" value="<?php echo htmlspecialchars($jardin['jardin_infoTerre']); ?>" required>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Modifier">
            <a class="btn-back" href="tableJardins.php">Retour</a>
        </div>
    </form>
</div>

<?php
require('../../composants/footer.php');
?>
