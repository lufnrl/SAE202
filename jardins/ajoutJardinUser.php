<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

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


if (empty($jardin_nom) || empty($jardin_surface) || empty($jardin_nbParcelles) || empty($jardin_adr) || empty($jardin_ville) || empty($jardin_coordLat) || empty($jardin_coordLong) || empty($jardin_photo) || empty($jardin_maps) || empty($jardin_infoTerre)) {
    $_SESSION['alert_message'] = 'Veuillez remplir tous les champs';
    $_SESSION['alert_type'] = 'error';
    header('Location: /jardins/formJardinUser.php');
    exit();
}

$requete = $bd->prepare('INSERT INTO jardins (jardin_nom, jardin_surface, jardin_nbParcelles, jardin_adr, jardin_ville, jardin_coordLat, jardin_coordLong, jardin_photo, jardin_maps, jardin_infoTerre, _user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$requete->bindParam(1, $jardin_nom);
$requete->bindParam(2, $jardin_surface);
$requete->bindParam(3, $jardin_nbParcelles);
$requete->bindParam(4, $jardin_adr);
$requete->bindParam(5, $jardin_ville);
$requete->bindParam(6, $jardin_coordLat);
$requete->bindParam(7, $jardin_coordLong);
$requete->bindParam(8, $jardin_photo);
$requete->bindParam(9, $jardin_maps);
$requete->bindParam(10, $jardin_infoTerre);
$requete->bindParam(11, $user_id);
$requete->execute();

move_uploaded_file($_FILES['jardin_photo']['tmp_name'], '../src/assets/uploads/' . $jardin_photo);

if ($requete) {
    $_SESSION['alert_message'] = 'Jardin ajouté';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de l\'ajout du jardin';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /users/compte.php');
?>