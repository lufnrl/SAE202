<?php

require '../model/connectBD.php';

session_start();

// Ajouter l'id de l'utilisateur à la parcelle et changer l'état de la parcelle en "ATTENTE"
$userId = $_POST['users'];
$parcelleId = $_POST['parcelles'];
$reservationDateDeb = $_POST['dateDeb']; // Date actuelle pour la réservation
$reservationDateFin = $_POST['dateFin']; // Date actuelle pour la réservation

if ($userId && $parcelleId) {
    try {

        // Mettre à jour le champ _user_id et l'état de la parcelle
        $req = $bd->prepare('UPDATE parcelles SET parcelle_reservation = ?, parcelle_etat = "ATTENTE" WHERE parcelle_id = ?');
        $req->bindParam(1, $userId);
        $req->bindParam(2, $parcelleId);
        $req->execute();

        // Insérer une nouvelle réservation dans la table reservation
        $insertReq = $bd->prepare('INSERT INTO reservations (reservation_dateDeb, reservation_dateFin, _parcelle_id, _user_id) VALUES (?, ?, ?, ?)');
        $insertReq->bindParam(1, $reservationDateDeb);
        $insertReq->bindParam(2, $reservationDateFin);
        $insertReq->bindParam(3, $parcelleId);
        $insertReq->bindParam(4, $userId);
        $insertReq->execute();

        $_SESSION['alert_message'] = 'Réservation effectuée avec succès.';
        $_SESSION['alert_type'] = 'success';
        header('Location: ../parcelles/reservationOk.php');
        exit();
    } catch (Exception $e) {
        // Annuler la transaction en cas d'erreur
        $bd->rollBack();
        $_SESSION['alert_message'] = 'Erreur lors de la réservation.';
        $_SESSION['alert_type'] = 'error';
    }
} else {
    $_SESSION['alert_message'] = 'Tous les champs requis doivent être remplis.';
    $_SESSION['alert_type'] = 'error';
}
?>
