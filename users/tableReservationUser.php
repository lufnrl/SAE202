<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

$id = $_SESSION['user_id'];

// Utilisation de PDO
$query = "SELECT * FROM parcelles WHERE _user_id = :id";
$req = $bd->prepare($query);

// Liaison des paramètres
$req->bindParam(':id', $id, PDO::PARAM_INT);

$req->execute();

// Vérifier si des réservations ont été trouvées
$reservations = $req->fetchAll(PDO::FETCH_ASSOC);
if (!$reservations) {
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo 'Vous n\'avez aucune réservation.';
} else {
    foreach ($reservations as $reservation) {
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<tr>';
        echo '<td>' . $reservation['parcelle_id'] . '</td>';
        echo '<td>' . $reservation['parcelle_content'] . '</td>';
        echo '<td>' . $reservation['parcelle_etat'] . '</td>';
        echo '<td>' . $reservation['parcelle_desc'] . '</td>';
        echo '<td>' . 'Du ' . $reservation['parcelle_dateDeb'] . ' au ' . $reservation['parcelle_dateFin'] . '</td>';
        echo '</tr>';
    }
}
?>

<a href="compte.php">Retour</a>
