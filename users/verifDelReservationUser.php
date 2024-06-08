<?php
require '../model/connectBD.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: formConnexion.php');
    exit();
}

$userId = $_GET['users'];
$reservationId = $_GET['parcelles'];

// Ajout de vérification pour les paramètres
if (empty($userId) || empty($reservationId)) {
    echo "Tous les champs requis doivent être remplis.";
    exit();
}

// Debug: Affichez les valeurs des paramètres pour vérifier qu'ils sont bien récupérés
var_dump($userId, $reservationId);

if ($userId && $reservationId) {
    // Mettre à jour les champs parcelle_reservation et parcelle_etat pour annuler la réservation
    $query = "UPDATE parcelles SET parcelle_reservation = NULL, parcelle_etat = 'LIBRE' WHERE parcelle_reservation = :userId AND parcelle_id = :reservationId";
    $req = $bd->prepare($query);

    $req->bindParam(':userId', $userId, PDO::PARAM_INT);
    $req->bindParam(':reservationId', $reservationId, PDO::PARAM_INT);

    // Debug: Affichez les valeurs bindées pour vérifier qu'elles sont bien passées
    var_dump($req);

    if ($req->execute()) {
        header('Location: compte.php');
        //echo "Réservation annulée avec succès.";
        exit();
    } else {
        // Debug: Affichez les erreurs PDO si la requête échoue
        $errorInfo = $req->errorInfo();
        //echo "Erreur lors de l'annulation de la réservation : " . $errorInfo[2];
        header('Location: compte.php');
    }
} else {
    //echo "Tous les champs requis doivent être remplis.";
    header('Location: compte.php');
}
?>
