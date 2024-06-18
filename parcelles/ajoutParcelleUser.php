<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

$parcelle_nom = $_POST['parcelle_nom'];
$parcelle_content = $_POST['parcelle_content'];
$parcelle_etat = $_POST['parcelle_etat'];
$_jardin_id = $_POST['_jardin_id'];
$_user_id = $_POST['_user_id'];

if (empty($parcelle_nom) ||  empty($parcelle_content) || empty($parcelle_etat) || empty($_jardin_id) || empty($_user_id)) {
    $_SESSION['alert_message'] = 'Veuillez remplir tous les champs';
    $_SESSION['alert_type'] = 'error';
    header('Location: /parcelles/formParcelleUser.php');
    exit();
}

$requete = $bd->prepare('INSERT INTO parcelles (parcelle_nom, parcelle_content, parcelle_etat, _jardin_id, _user_id) VALUES (?, ?, ?, ?, ?)');
$requete->bindParam(1, $parcelle_nom);
$requete->bindParam(2, $parcelle_content);
$requete->bindParam(3, $parcelle_etat);
$requete->bindParam(4, $_jardin_id);
$requete->bindParam(5, $_user_id);
$requete->execute();

if ($requete) {
    $_SESSION['alert_message'] = 'Parcelle ajoutée';
    $_SESSION['alert_type'] = 'success';
} else {
    $_SESSION['alert_message'] = 'Erreur lors de l\'ajout de la parcelle';
    $_SESSION['alert_type'] = 'error';
}

header('Location: /users/compte.php');
?>