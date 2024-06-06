<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: formConnexion.php');
    exit();
}

// Utilisation de PDO
$query = "SELECT * FROM parcelles where parcelle_etat = 'LIBRE'";
$req = $bd->prepare($query);
$req->execute(); // Exécuter la requête

// Récupérer les résultats
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);

if (!$parcelles) {
    echo 'Aucune parcelle n\'est disponible.';
} else {
    foreach ($parcelles as $parcelle) {
        echo '<tr>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<td>' . $parcelle['parcelle_id'] . '</td>';
        echo '<td>' . $parcelle['parcelle_content'] . '</td>';
        echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
        echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
        echo '<td>' . 'Du ' . $parcelle['parcelle_dateDeb'] . ' au ' . $parcelle['parcelle_dateFin']. '</td>';
        echo '<td><a href="verifReservation?users='.$_SESSION['user_id'].'">Reserver</a></td>';
        echo '</tr>';
    }
}
?>
