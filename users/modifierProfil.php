<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';
session_start();
?>
<div>
    Mon profil
</div>
<div>
    <form action="verifModifProfil.php" method="post">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php echo $_SESSION['user_nom'] ?>">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $_SESSION['user_prnm'] ?>">
        </div>
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" value="<?php echo $_SESSION['user_login'] ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $_SESSION['user_email'] ?>">
        </div>
        <div>
            <input type="submit" value="Modifier">
            <a href="compte.php">Retour</a>
        </div>
    </form>
</div>