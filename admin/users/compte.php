<?php
require '../../composants/head.php';
require '../../composants/headerAdmin.php';
require '../../model/connectBD.php';

$user_id = $_GET['users'];

$req = $bd->query("SELECT * FROM users WHERE user_id = $user_id");
$users = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . $user['user_id'] . '</td>';
    echo '<td>' . $user['user_nom'] . '</td>';
    echo '<td>' . $user['user_prnm'] . '</td>';
    echo '<td>' . $user['user_login'] . '</td>';
    echo '<td>' . $user['user_email'] . '</td>';
    echo '<td>' . $user['user_photo'] . '</td>';
    echo '<td><a href="compte.php?users=' . $user['user_id'] . '">Modifier</a><a href="compte.php?users=' . $user['user_id'] . '">Supprimer</a></td>';
    echo '</tr>';
}

echo '<br>';

// recuperer les parcelles de l'utilisateur
$requete = $bd->prepare('SELECT * FROM parcelles WHERE _user_id = ?');
$requete->bindParam(1, $user_id);
$requete->execute();
$parcelles = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach ($parcelles as $parcelle) {
    echo '<tr>';
    echo '<td>' . $parcelle['parcelle_id'] . '</td>';
    echo '<td>' . $parcelle['parcelle_nom'] . '</td>';
    echo '<td>' . $parcelle['parcelle_content'] . '</td>';
    echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
    echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
    echo '</tr>';
}
?>

<a href="/admin/users/tableUsers.php">Retour</a>
