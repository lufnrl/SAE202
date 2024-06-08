
<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: formConnexion.php');
    exit();
}

$userIdReserva = $_SESSION['user_id'];

// Utilisation de PDO
$query = "SELECT * FROM parcelles WHERE parcelle_reservation = :userIdReserva";
$req = $bd->prepare($query);

// Liaison des paramètres
$req->bindParam(':userIdReserva', $userIdReserva, PDO::PARAM_INT);

$req->execute();

// Vérifier si des réservations ont été trouvées
$reservations = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<div>
    Mes réservations
</div>
<div>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Propriétaire</th>
            <th>Nom</th>
            <th>Etat</th>
            <th>Description</th>
            <th>Date de reservations</th>
            <th>Actions</th>
        </tr>

        <?php
        if (!$reservations) {
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<tr>' . 'Vous n\'avez aucune réservation' . '</tr>';
        } else {
            foreach ($reservations as $reservation) {
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<tr>';
                echo '<td>' . $reservation['parcelle_id'] . '</td>';
                echo '<td>' . $reservation['_user_id'] . '</td>';
                echo '<td>' . $reservation['parcelle_content'] . '</td>';
                echo '<td>' . $reservation['parcelle_etat'] . '</td>';
                echo '<td>' . $reservation['parcelle_desc'] . '</td>';
                echo '<td>' . 'Du ' . $reservation['parcelle_dateDeb'] . ' au ' . $reservation['parcelle_dateFin'] . '</td>';
                echo '<td><a href="verifDelReservationUser.php?users='.$_SESSION['user_id'].'&parcelles='.$reservation['parcelle_id'].'">Annuler la reservation</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>

<a href="compte.php">Retour</a>
