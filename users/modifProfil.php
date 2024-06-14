<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';
?>
<h1>Mon profil</h1>
<div class="profile-edit-container">
    <form action="verifModifProfil.php" method="post" enctype="multipart/form-data">
        <div class="profile-photo-section">
            <?php
            $query = "SELECT user_photo FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
            $req = $bd->query($query);
            $photo = $req->fetch()['user_photo'];
            echo '<img class="profile-photo" src="/src/assets/uploads/' . $photo . '" alt="Photo de profil">';
            ?>
        </div>
        <div class="form-group">
            <label for="photo">Changer la couverture:</label>
            <input type="file" id="photo" name="photo">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['user_nom'] ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['user_prnm'] ?>">
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" value="<?php echo $_SESSION['user_login'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email'] ?>">
        </div>
        <a class="password-link" href="modifPassword.php">Modifier le mot de passe</a>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Modifier">
            <a class="btn-back" href="compte.php">Retour</a>
        </div>
    </form>
</div>

<?php
require '../composants/footer.php';
?>