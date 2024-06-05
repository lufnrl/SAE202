<?php
require '../model/connectBD.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: formConnexion.php');
    exit();
}

$req = $bd->query('DELETE FROM users WHERE user_id = '.$_SESSION['user_id'].'');
//on récupère le résultat
$resultat = $req->fetch();

session_destroy();

header('Location: ../index.php');
//echo "Compte supprimé avec succès.";

exit();
?>