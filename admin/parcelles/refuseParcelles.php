<?php
session_start();
require '../../model/connectBD.php';

// refuser la parcelle

if (isset($_GET['parcelles'])) {
    $parcelle_id = $_GET['parcelles'];

    $req = $bd->prepare("UPDATE parcelles SET parcelle_etat = 'LIBRE' WHERE parcelle_id = ?");
    $req->bindParam(1, $parcelle_id);
    $req->execute();

    header('Location: tableParcelles.php');
    exit();
}
?>