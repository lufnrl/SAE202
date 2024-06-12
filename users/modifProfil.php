<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';
?>
<h1>
    Mon profil
</h1>
<div>
    <form action="verifModifProfil.php" method="post" enctype="multipart/form-data">
        <div>
            <label>Couverture actuelle:</label>
            <br>
            <?php
            $query = "SELECT user_photo FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
            $req = $bd->query($query);
            $photo = $req->fetch()['user_photo'];
                echo '<img src="/src/assets/uploads/' . $photo . '" alt="Photo de profil">';
            ?>
        </div>
        <div>
            <label for="photo">Changer la couverture:</label>
            <input type="file" id="photo" name="photo">
        </div>
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
        <a href="modifPassword.php">Modifier le mot de passe</a>
        <div>
            <input type="submit" value="Modifier">
            <a href="compte.php">Retour</a>
        </div>
    </form>
</div>