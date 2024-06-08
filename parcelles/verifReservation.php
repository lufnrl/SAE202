<?php

require '../model/connectBD.php';

session_start();

// ajouter l'id de l'utilisateur a la parcelle_reservation et changer l'etat de la parcelle en "en attente"

$userId = $_GET['users'];
$parcelleId = $_GET['parcelles'];

if ($userId && $parcelleId) {
    // Mettre à jour le champ _user_id pour la réservation
    $query = "UPDATE parcelles SET parcelle_reservation = :userId, parcelle_etat = 'ATTENTE' WHERE parcelle_id = :parcelleId";
    $req = $bd->prepare($query);

    $req->bindParam(':userId', $userId, PDO::PARAM_INT);
    $req->bindParam(':parcelleId', $parcelleId, PDO::PARAM_INT);

    if ($req->execute()) {
        header('Location: ../users/compte.php');
        exit();
    } else {
        echo "Erreur lors de la réservation.";
    }
} else {
    echo "Tous les champs requis doivent être remplis.";
}
?>