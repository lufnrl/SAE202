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

$parcelle_id = $_GET['parcelles'];

$query = "SELECT * FROM parcelles WHERE parcelle_id = :parcelle_id";
$req = $bd->prepare($query);
$req->execute(['parcelle_id' => $parcelle_id]);
$parcelle = $req->fetch();

?>

<h1>Modifier une parcelle</h1>

<div class="profile-edit-container">
    <form action="verifModifParcelles.php" method="post">
        <div class="form-group">
            <input type="hidden" name="parcelle_id" value="<?php echo htmlspecialchars($parcelle['parcelle_id']); ?>">
        </div>
        <div class="form-group">
            <label for="parcelle_nom">Nom de la parcelle</label>
            <input type="text" name="parcelle_nom" id="parcelle_nom" value="<?php echo htmlspecialchars($parcelle['parcelle_nom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="parcelle_content">Contenu de la parcelle</label>
            <input type="text" name="parcelle_content" id="parcelle_content" value="<?php echo htmlspecialchars($parcelle['parcelle_content']); ?>" required>
        </div>
        <div class="form-group">
            <label for="parcelle_etat">Etat de la parcelle</label>
            <input type="text" name="parcelle_etat" id="parcelle_etat" value="<?php echo htmlspecialchars($parcelle['parcelle_etat']); ?>" required>
        </div>
        <div class="form-group">
            <label for="parcelle_desc">Description de la parcelle</label>
            <textarea name="parcelle_desc" id="parcelle_desc" required><?php echo htmlspecialchars($parcelle['parcelle_desc']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="_jardin_id">Jardin de la parcelle</label>
            <select name="_jardin_id" id="_jardin_id" required>
                <?php
                $query = "SELECT * FROM jardins WHERE _user_id = :user_id";
                $req = $bd->prepare($query);
                $req->execute(['user_id' => $parcelle['_user_id']]);
                while ($jardin = $req->fetch()) {
                    $selected = $jardin['jardin_id'] == $parcelle['_jardin_id'] ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($jardin['jardin_id']) . '" ' . $selected . '>' . htmlspecialchars($jardin['jardin_nom']) . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Modifier">
            <a class="btn-back" href="tableParcelles.php">Retour</a>
        </div>
    </form>
</div>

<?php
require('../../composants/footer.php');
?>
