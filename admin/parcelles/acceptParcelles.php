<?php
session_start();

require '../../model/connectBD.php';

// accepter la parcelle

if (isset($_GET['parcelles'])) {
    $parcelle_id = $_GET['parcelles'];

    $req = $bd->prepare("UPDATE parcelles SET parcelle_etat = 'RESERVE' WHERE parcelle_id = ?");
    $req->bindParam(1, $parcelle_id);
    $req->execute();

    $_SESSION['alert_message'] = 'Parcelle acceptée';
    $_SESSION['alert_type'] = 'success';

    header('Location: tableParcelles.php');
    exit();
}
?>