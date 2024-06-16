<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: formConnexion.php');
    exit();
}

$userId = $_GET['users'];
$reservationId = $_GET['parcelles'];

// Ajout de vérification pour les paramètres
if (empty($userId) || empty($reservationId)) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Tous les champs requis doivent être remplis.";
    exit();
}

// Debug: Affichez les valeurs des paramètres pour vérifier qu'ils sont bien récupérés
var_dump($userId, $reservationId);

if ($userId && $reservationId) {
    // Mettre à jour les informations de la parcelle
    $updateQuery = "UPDATE parcelles SET parcelle_reservation = NULL, parcelle_etat = 'LIBRE' WHERE parcelle_reservation = :userId AND parcelle_id = :reservationId";
    $updateReq = $bd->prepare($updateQuery);
    $updateReq->bindParam(':userId', $userId, PDO::PARAM_INT);
    $updateReq->bindParam(':reservationId', $reservationId, PDO::PARAM_INT);

    $updateReq->execute();

    // Supprimer la réservation de la table reservation
    $deleteQuery = "DELETE FROM reservations WHERE _user_id = :userId AND _parcelle_id = :reservationId";
    $deleteReq = $bd->prepare($deleteQuery);
    $deleteReq->bindParam(':userId', $userId, PDO::PARAM_INT);
    $deleteReq->bindParam(':reservationId', $reservationId, PDO::PARAM_INT);

    $deleteReq->execute();

    if ($deleteReq && $updateReq->execute()) {
        $_SESSION['alert_type'] = "success";
        $_SESSION['alert_message'] = "Réservation annulée avec succès.";
        header('Location: compte.php');
        //echo "Réservation annulée avec succès.";
        exit();
    } else {
        // Debug: Affichez les erreurs PDO si la requête échoue
        $errorInfo = $req->errorInfo();
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Erreur lors de l'annulation de la réservation : " . $errorInfo[2];
        //echo "Erreur lors de l'annulation de la réservation : " . $errorInfo[2];
        header('Location: compte.php');
    }
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Tous les champs requis doivent être remplis.";
    //echo "Tous les champs requis doivent être remplis.";
    header('Location: compte.php');
}
?>
