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
require '../../composants/headerAdmin.php';

$user_id = $_GET['users'];

// Retrieve user information
$query = "SELECT * FROM users WHERE user_id = :user_id";
$req = $bd->prepare($query);
$req->execute(['user_id' => $user_id]);
$user = $req->fetch();
?>

<h1>Modification de profil de <?php echo htmlspecialchars($user['user_nom'] . ' ' . $user['user_prnm']); ?></h1>

<div class="profile-edit-container">
    <form action="verifModifFormUser.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        </div>
        <div class="form-group">
            <label>Couverture actuelle:</label>
            <br>
            <img src="/src/assets/uploads/<?php echo htmlspecialchars($user['user_photo']); ?>" alt="Photo de profil" style="width:100px;">
        </div>
        <div class="form-group">
            <label for="photo">Photo de profil</label>
            <input type="file" name="photo" id="photo">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($user['user_nom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($user['user_prnm']); ?>" required>
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="<?php echo htmlspecialchars($user['user_login']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['user_email']); ?>" required>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn-submit" value="Modifier">
            <a class="btn-back" href="/admin/users/tableUsers.php">Retour</a>
        </div>
    </form>
</div>

<?php
require('../../composants/footer.php');
?>
