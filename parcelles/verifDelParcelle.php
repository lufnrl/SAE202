<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

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