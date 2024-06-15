<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

require '../composants/head.php';
require '../composants/header.php';

$userID = $_SESSION['user_id'];

$req = $bd->query("SELECT * FROM reservations WHERE _user_id = $userID ORDER BY id DESC LIMIT 1");
$reservations = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($reservations as $reservation) {
    $reservationID = $reservation['id'];
}

?>

<h1><svg style="fill: #046c4e;" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/></svg></h1>
<h1>Votre réservation à bien été prise en compte !</h1>
<p>Votre réservation <strong>#<?= $reservationID ?></strong> est en cours de validation par l'équipe de Jard'Unis</p>
<div>
    <a href="/users/compte.php">Voir mes réservations</a>
    <a href="/parcelles/tableReservation.php">Retour</a>
</div>