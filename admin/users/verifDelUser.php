<?php
session_start();
require '../../model/connectBD.php';

$user_id = $_GET['users'];

$requete = $bd->prepare('DELETE FROM users WHERE user_id = ?');
$requete->bindParam(1, $user_id);
$requete->execute();

if ($requete) {
    $_SESSION['alert_message'] = 'Utilisateur supprimé';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de la suppression de l\'utilisateur';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /admin/users/tableUsers.php');
?>