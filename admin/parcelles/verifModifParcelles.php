<?php
session_start();
require '../../model/connectBD.php';

$parcelle_id = $_POST['parcelle_id'];
$parcelle_nom = $_POST['parcelle_nom'];
$parcelle_content = $_POST['parcelle_content'];
$parcelle_etat = $_POST['parcelle_etat'];
$_jardin_id = $_POST['_jardin_id'];

$requete = $bd->prepare('UPDATE parcelles SET parcelle_nom = ?, parcelle_content = ?, parcelle_etat = ?, _jardin_id = ? WHERE parcelle_id = ?');
$requete->bindParam(1, $parcelle_nom);
$requete->bindParam(2, $parcelle_content);
$requete->bindParam(3, $parcelle_etat);
$requete->bindParam(4, $_jardin_id);
$requete->bindParam(5, $parcelle_id);
$requete->execute();

if ($requete) {
    $_SESSION['alert_message'] = 'Parcelle modifiée';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de la modification de la parcelle';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /admin/parcelles/tableParcelles.php');
?>