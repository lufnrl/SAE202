<?php
require '../../model/connectBD.php';

session_start();

$jardin_id = $_GET['jardins'];

$requete = $bd->prepare('DELETE FROM jardins WHERE jardin_id = ?');
$requete->bindParam(1, $jardin_id);
$requete->execute();

if ($requete) {
    $_SESSION['alert_message'] = 'Jardin supprimé';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de la suppression du jardin';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /admin/jardins/tableJardins.php');
?>