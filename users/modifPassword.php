<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';
?>

<h1>
    Modifier le mot de passe
</h1>

<div>
    <form action="verifModifPassword.php" method="post">
        <div>
            <label for="newPassword">Nouveau mot de passe</label>
            <input type="password" name="newPassword">
        </div>
        <div>
            <label for="confirmNewPassword">Confirmer le nouveau mot de passe</label>
            <input type="password" name="confirmNewPassword">
        </div>
        <div>
            <input type="submit" value="Modifier">
            <a href="compte.php">Retour</a>
        </div>
    </form>
</div>
