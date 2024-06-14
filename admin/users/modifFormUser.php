<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';

$user_id = $_GET['users'];

// Récupérer les informations de l'utilisateur
$req = $bd->query("SELECT * FROM users WHERE user_id = '" . $user_id . "'");
$user = $req->fetch();
?>
<h1>
    Modification de profil de <?php echo $user['user_nom'] . ' ' . $user['user_prnm'] ?>
</h1>
<div>
    <form action="verifModifFormUser.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        </div>
        <div>
            <label>Couverture actuelle:</label>
            <br>
            <?php
            echo '<img src="/src/assets/uploads/' . $user['user_photo'] . '" alt="Photo de profil">';
            ?>
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php echo $user['user_nom'] ?>">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $user['user_prnm'] ?>">
        </div>
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" value="<?php echo $user['user_login'] ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $user['user_email'] ?>">
        </div>
        <div>
            <input type="submit" value="Modifier">
            <a href="/admin/users/tableUsers.php">Retour</a>
        </div>
    </form>
</div>

<?php
require('../../composants/footer.php');
?>