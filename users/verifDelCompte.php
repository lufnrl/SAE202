<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: formConnexion.php');
    exit();
}

$req = $bd->query('DELETE FROM users WHERE user_id = '.$_SESSION['user_id'].'');
//on récupère le résultat
$resultat = $req->fetch();

session_destroy();

$_SESSION['alert_type'] = "success";
$_SESSION['alert_message'] = "Compte supprimé avec succès.";

header('Location: ../index.php');
//echo "Compte supprimé avec succès.";

exit();
?>