<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: formConnexion.php');
    exit();
}

?>

<h1>Modifier le mot de passe</h1>

<div class="profile-edit-container">
    <form action="verifModifPassword.php" method="post">
        <div class="form-group">
            <label for="newPassword">Nouveau mot de passe</label>
            <input type="password" id="newPassword" name="newPassword">
        </div>
        <div class="form-group">
            <label for="confirmNewPassword">Confirmer le nouveau mot de passe</label>
            <input type="password" id="confirmNewPassword" name="confirmNewPassword">
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Modifier">
            <a class="btn-back" href="compte.php">Retour</a>
        </div>
    </form>
</div>
