<?php
$titre = 'Profil utilisateur admin';
$desc = 'Page de profil utilisateur';
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

<h1>Profil de <?php echo htmlspecialchars($user['user_nom'] . ' ' . $user['user_prnm']); ?></h1>

<div class="profile-container">
<div class="profile-admin-section">
<h2 class="section-title">Informations sur l'utilisateur <?= $user['user_prnm'] . ' ' . $user['user_nom'] ?></h2>
<div class="profile-info">
    <?php
    // Fetch the user photo from the database
    $query = "SELECT user_photo FROM users WHERE user_id = '" . $user_id . "'";
    $req = $bd->query($query);
    $photo = $req->fetch()['user_photo'];
    echo '<img class="profile-photo" src="/src/assets/uploads/' . htmlspecialchars($photo) . '" alt="Photo de profil">';
    ?>
    <div class="profile-text">
        <p class="profile-name"><span>Nom : </span><?php echo htmlspecialchars($user['user_nom']); ?></p>
        <p class="profile-name"><span>Prénom : </span><?php echo htmlspecialchars($user['user_prnm']); ?></p>
        <p class="profile-login"><span>Nom d'utilisateur : </span><?php echo htmlspecialchars($user['user_login']); ?></p>
        <p class="profile-mail"><span>Adresse mail : </span><?php echo htmlspecialchars($user['user_email']); ?></p>
    </div>
</div>

    <h2>Parcelles</h2>
    <div class="profile-sections">
        <table class="profile-table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Contenu</th>
                <th>État</th>
            </tr>
            <?php
            // Fetch user's parcelles
            $query = "SELECT * FROM parcelles WHERE _user_id = :user_id";
            $req = $bd->prepare($query);
            $req->execute(['user_id' => $user_id]);
            $parcelles = $req->fetchAll(PDO::FETCH_ASSOC);

            if (empty($parcelles)) {
                echo '<tr><td colspan="5">Vous n\'avez aucune parcelle.</td></tr>';
            } else {
                foreach ($parcelles as $parcelle) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($parcelle['parcelle_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($parcelle['parcelle_nom']) . '</td>';
                    echo '<td>' . htmlspecialchars($parcelle['parcelle_content']) . '</td>';
                    echo '<td>' . htmlspecialchars($parcelle['parcelle_etat']) . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>

    <h2>Jardins</h2>
    <div class="profile-sections">
        <table class="profile-table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Surface</th>
                <th>Nombre de parcelles</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Photo</th>
                <th>Maps</th>
                <th>Info Terre</th>
            </tr>
            <?php
            // Fetch user's jardins
            $query = "SELECT * FROM jardins WHERE _user_id = :user_id";
            $req = $bd->prepare($query);
            $req->execute(['user_id' => $user_id]);
            $jardins = $req->fetchAll(PDO::FETCH_ASSOC);

            if (empty($jardins)) {
                echo '<tr><td colspan="11">Vous n\'avez aucun jardin.</td></tr>';
            } else {
                foreach ($jardins as $jardin) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_nom']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_surface']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_nbParcelles']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_adr']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_ville']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_coordLat']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_coordLong']) . '</td>';
                    echo '<td><img src="/src/assets/uploads/' . htmlspecialchars($jardin['jardin_photo']) . '" alt="Photo de jardin" style="width:100px;"></td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_maps']) . '</td>';
                    echo '<td>' . htmlspecialchars($jardin['jardin_infoTerre']) . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
    </div>
</div>
</div>

<?php
require('../../composants/footer.php');
?>
