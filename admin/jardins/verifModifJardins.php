<?php
session_start();
require '../../model/connectBD.php';

$jardin_id = $_POST['jardin_id'];
$jardin_nom = $_POST['jardin_nom'];
$jardin_desc = $_POST['jardin_desc'];
$jardin_surface = $_POST['jardin_surface'];
$jardin_adr = $_POST['jardin_adr'];
$jardin_ville = $_POST['jardin_ville'];
$jardin_coordLat = $_POST['jardin_coordLat'];
$jardin_coordLong = $_POST['jardin_coordLong'];
$jardin_photo = $_FILES['jardin_photo']['name'];
$jardin_maps = $_POST['jardin_maps'];
$jardin_infoTerre = $_POST['jardin_infoTerre'];

if ($jardin_photo != '') {
    $requete = $bd->prepare('UPDATE jardins SET jardin_nom = ?, jardin_desc = ? , jardin_surface = ?, jardin_adr = ?, jardin_ville = ?, jardin_coordLat = ?, jardin_coordLong = ?, jardin_photo = ?, jardin_maps = ?, jardin_infoTerre = ? WHERE jardin_id = ?');
    $requete->bindParam(1, $jardin_nom);
    $requete->bindParam(2, $jardin_desc);
    $requete->bindParam(3, $jardin_surface);
    $requete->bindParam(4, $jardin_adr);
    $requete->bindParam(5, $jardin_ville);
    $requete->bindParam(6, $jardin_coordLat);
    $requete->bindParam(7, $jardin_coordLong);
    $requete->bindParam(8, $jardin_photo);
    $requete->bindParam(9, $jardin_maps);
    $requete->bindParam(10, $jardin_infoTerre);
    $requete->bindParam(11, $jardin_id);
    $requete->execute();

    move_uploaded_file($_FILES['jardin_photo']['tmp_name'], '../../src/assets/uploads/' . $jardin_photo);

    if ($requete) {
        $_SESSION['alert_message'] = 'Jardin modifié';
        $_SESSION['alert_type'] = 'success';
    } else {
        $_SESSION['alert_message'] = 'Erreur lors de la modification du jardin';
        $_SESSION['alert_type'] = 'error';
    }

    header('Location: /admin/jardins/tableJardins.php');
} else {
    $requete = $bd->prepare('UPDATE jardins SET jardin_nom = ?, jardin_desc = ? , jardin_surface = ?, jardin_adr = ?, jardin_ville = ?, jardin_coordLat = ?, jardin_coordLong = ?, jardin_maps = ?, jardin_infoTerre = ? WHERE jardin_id = ?');
    $requete->bindParam(1, $jardin_nom);
    $requete->bindParam(2, $jardin_desc);
    $requete->bindParam(3, $jardin_surface);
    $requete->bindParam(4, $jardin_adr);
    $requete->bindParam(5, $jardin_ville);
    $requete->bindParam(6, $jardin_coordLat);
    $requete->bindParam(7, $jardin_coordLong);
    $requete->bindParam(8, $jardin_maps);
    $requete->bindParam(9, $jardin_infoTerre);
    $requete->bindParam(10, $jardin_id);
    $requete->execute();

    if ($requete) {
        $_SESSION['alert_message'] = 'Jardin modifié';
        $_SESSION['alert_type'] = 'success';
    } else {
        $_SESSION['alert_message'] = 'Erreur lors de la modification du jardin';
        $_SESSION['alert_type'] = 'error';
    }

    header('Location: /admin/jardins/tableJardins.php');
}

?>