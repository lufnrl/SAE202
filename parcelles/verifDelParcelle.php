<?php
require '../model/connectBD.php';

session_start();

$parcelle_id = $_GET['parcelles'];

$requete = $bd->prepare('DELETE FROM parcelles WHERE parcelle_id = ?');
$requete->bindParam(1, $parcelle_id);
$requete->execute();

if ($requete) {
    $_SESSION['alert_message'] = 'Parcelle supprimée';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de la réservation';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /users/compte.php');
?>