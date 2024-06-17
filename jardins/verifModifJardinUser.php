<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

$jardin_id = $_POST['jardin_id'];
$jardin_nom = $_POST['jardin_nom'];
$jardin_desc = $_POST['jardin_desc'];
$jardin_adr = $_POST['jardin_adr'];
$jardin_coordLat = $_POST['jardin_coordLat'];
$jardin_coordLong = $_POST['jardin_coordLong'];
$jardin_surface = $_POST['jardin_surface'];
$jardin_infoTerre = $_POST['jardin_infoTerre'];
$jardin_photo = $_FILES['jardin_photo']['name'];
$jardin_photo_actuel = $_POST['jardin_photo_actuel']; // Corrected variable to POST

if ($jardin_photo) {
    $dossier = '../src/assets/uploads/';
    if (move_uploaded_file($_FILES['jardin_photo']['tmp_name'], $dossier . $jardin_photo)) {
        $requete = $bd->prepare('UPDATE jardins SET jardin_nom = ?, jardin_desc = ? , jardin_adr = ?, jardin_coordLat = ?, jardin_coordLong = ?, jardin_surface = ?, jardin_infoTerre = ?, jardin_photo = ? WHERE jardin_id = ?');
        $requete->bindParam(1, $jardin_nom);
        $requete->bindParam(2, $jardin_desc);
        $requete->bindParam(3, $jardin_adr);
        $requete->bindParam(4, $jardin_coordLat);
        $requete->bindParam(5, $jardin_coordLong);
        $requete->bindParam(6, $jardin_surface);
        $requete->bindParam(7, $jardin_infoTerre);
        $requete->bindParam(8, $jardin_photo);
        $requete->bindParam(9, $jardin_id);
    } else {
        $_SESSION['alert_message'] = 'Erreur lors du téléchargement de l\'image.';
        $_SESSION['alert_type'] = 'danger';
        header('Location: /users/compte.php');
        exit();
    }
} else {
    $requete = $bd->prepare('UPDATE jardins SET jardin_nom = ?, jardin_desc = ? , jardin_adr = ?, jardin_coordLat = ?, jardin_coordLong = ?, jardin_surface = ?, jardin_infoTerre = ? WHERE jardin_id = ?');
    $requete->bindParam(1, $jardin_nom);
    $requete->bindParam(2, $jardin_desc);
    $requete->bindParam(3, $jardin_adr);
    $requete->bindParam(4, $jardin_coordLat);
    $requete->bindParam(5, $jardin_coordLong);
    $requete->bindParam(6, $jardin_surface);
    $requete->bindParam(7, $jardin_infoTerre);
    $requete->bindParam(8, $jardin_id);
}

if ($requete->execute()) {
    $_SESSION['alert_message'] = 'Jardin modifié avec succès.';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de la modification du jardin.';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /users/compte.php');
exit();
?>