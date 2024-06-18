<?php
session_start();
require '../../model/connectBD.php';

$user_id = $_SESSION['user_id'];
$jardin_nom = $_POST['jardin_nom'];
$jardin_surface = $_POST['jardin_surface'];
$jardin_nbParcelles = $_POST['jardin_nbParcelles'];
$jardin_adr = $_POST['jardin_adr'];
$jardin_ville = $_POST['jardin_ville'];
$jardin_coordLat = $_POST['jardin_coordLat'];
$jardin_coordLong = $_POST['jardin_coordLong'];
$jardin_photo = $_FILES['jardin_photo']['name'];
$jardin_maps = $_POST['jardin_maps'];
$jardin_infoTerre = $_POST['jardin_infoTerre'];
$jardin_desc = $_POST['jardin_desc'];


if (empty($jardin_nom) || empty($jardin_surface) || empty($jardin_nbParcelles) || empty($jardin_adr) || empty($jardin_ville) || empty($jardin_coordLat) || empty($jardin_coordLong) || empty($jardin_photo) || empty($jardin_maps) || empty($jardin_infoTerre)) {
    $_SESSION['alert_message'] = 'Veuillez remplir tous les champs';
    $_SESSION['alert_type'] = 'error';
    header('Location: /admin/jardins/formJardinAdmin.php');
    exit();
}

$requete = $bd->prepare('INSERT INTO jardins (jardin_nom, jardin_desc, jardin_surface, jardin_nbParcelles, jardin_adr, jardin_ville, jardin_coordLat, jardin_coordLong, jardin_photo, jardin_maps, jardin_infoTerre, _user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$requete->bindParam(1, $jardin_nom);
$requete->bindParam(2, $jardin_desc);
$requete->bindParam(3, $jardin_surface);
$requete->bindParam(4, $jardin_nbParcelles);
$requete->bindParam(5, $jardin_adr);
$requete->bindParam(6, $jardin_ville);
$requete->bindParam(7, $jardin_coordLat);
$requete->bindParam(8, $jardin_coordLong);
$requete->bindParam(9, $jardin_photo);
$requete->bindParam(10, $jardin_maps);
$requete->bindParam(11, $jardin_infoTerre);
$requete->bindParam(12, $user_id);
$requete->execute();

move_uploaded_file($_FILES['jardin_photo']['tmp_name'], '../src/assets/uploads/' . $jardin_photo);

if ($requete) {
    $_SESSION['alert_message'] = 'Jardin ajouté';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de l\'ajout du jardin';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /admin/jardins/tableJardins.php');
?>