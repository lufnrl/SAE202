<?php
require '../../model/connectBD.php';

session_start();

$parcelle_id = $_POST['parcelle_id'];
$parcelle_nom = $_POST['parcelle_nom'];
$parcelle_content = $_POST['parcelle_content'];
$parcelle_etat = $_POST['parcelle_etat'];
$parcelle_desc = $_POST['parcelle_desc'];
$_jardin_id = $_POST['_jardin_id'];

$requete = $bd->prepare('UPDATE parcelles SET parcelle_nom = ?, parcelle_content = ?, parcelle_etat = ?, parcelle_desc = ?, _jardin_id = ? WHERE parcelle_id = ?');
$requete->bindParam(1, $parcelle_nom);
$requete->bindParam(2, $parcelle_content);
$requete->bindParam(3, $parcelle_etat);
$requete->bindParam(4, $parcelle_desc);
$requete->bindParam(5, $_jardin_id);
$requete->bindParam(6, $parcelle_id);
$requete->execute();

if ($requete) {
    $_SESSION['alert_message'] = 'Parcelle modifiée';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de la modification de la parcelle';
    $_SESSION['alert_type'] = 'danger';
}

header('Location: /admin/parcelles/tableParcelles.php');
?>