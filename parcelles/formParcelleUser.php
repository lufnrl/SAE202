<?php
$titre = 'Ajout d\'une parcelle';
$desc = 'Page d\'ajout d\'une parcelle utilisateur';
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

<h1 class="title-form">Ajouter une parcelle</h1>

<div class="profile-edit-container">
    <form action="ajoutParcelleUser.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="parcelle_nom">Nom de la parcelle</label>
            <input type="text" name="parcelle_nom" id="parcelle_nom" required>
        </div>
        <div class="form-group">
            <label for="parcelle_content">Contenu de la parcelle</label>
            <input type="text" name="parcelle_content" id="parcelle_content" required>
        </div>
        <div class="form-group">
            <label for="parcelle_etat">Etat de la parcelle</label>
            <select name="parcelle_etat" id="parcelle_etat" required>
                <option value="LIBRE" selected>Libre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="_jardin_id">Le jardin</label>
            <select name="_jardin_id" id="_jardin_id" required>
                <?php
                $query = "SELECT * FROM jardins WHERE _user_id = '" . $_SESSION['user_id'] . "'";
                $req = $bd->query($query);
                while ($jardin = $req->fetch()) {
                    echo '<option value="' . $jardin['jardin_id'] . '">' . $jardin['jardin_nom'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="_user_id">Le propriétaire</label>
            <select name="_user_id" id="_user_id" required>
                <?php
                $query = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
                $req = $bd->query($query);
                while ($user = $req->fetch()) {
                    echo '<option value="' . $user['user_id'] . '">' . $user['user_nom'] . ' ' . $user['user_prnm'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Ajouter">
            <a class="btn-back" href="../users/compte.php">Retour</a>
        </div>
    </form>
</div>

<?php require('../composants/footer.php'); ?>