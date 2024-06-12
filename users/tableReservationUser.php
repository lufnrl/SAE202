<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: formConnexion.php');
    exit();
}

$userIdReserva = $_SESSION['user_id'];

// Utilisation de PDO pour récupérer les informations des parcelles et des réservations
$query = "
    SELECT 
        p.parcelle_id, 
        p.parcelle_nom, 
        p.parcelle_content, 
        p.parcelle_etat, 
        p.parcelle_desc, 
        p.parcelle_reservation,
        r.reservation_dateDeb, 
        r.reservation_dateFin,
        r._user_id as reservation_user_id
    FROM parcelles p
    INNER JOIN reservations r ON p.parcelle_id = r._parcelle_id
    WHERE r._user_id = :userIdReserva AND (p.parcelle_etat = 'RESERVE' OR p.parcelle_etat = 'ATTENTE')
";
$req = $bd->prepare($query);

// Liaison des paramètres
$req->bindParam(':userIdReserva', $userIdReserva, PDO::PARAM_INT);

$req->execute();

// Vérifier si des réservations ont été trouvées
$reservations = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>
    Mes réservations
</h1>
<div>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Propriétaire</th>
            <th>Nom</th>
            <th>Contenu</th>
            <th>Etat</th>
            <th>Description</th>
            <th>Date de réservations</th>
            <th>Actions</th>
        </tr>

        <?php
        if (!$reservations) {
            echo '<tr><td colspan="8">Vous n\'avez aucune réservation</td></tr>';
        } else {
            foreach ($reservations as $reservation) {
                echo '<tr>';
                echo '<td>' . $reservation['parcelle_id'] . '</td>';
                echo '<td>' . $reservation['reservation_user_id'] . '</td>';
                echo '<td>' . $reservation['parcelle_nom'] . '</td>';
                echo '<td>' . $reservation['parcelle_content'] . '</td>';
                echo '<td>' . $reservation['parcelle_etat'] . '</td>';
                echo '<td>' . $reservation['parcelle_desc'] . '</td>';
                // changer le format de la date de réservation de yyyy-mm-dd à dd-mm-yyyy
                $dateDeb = date_create($reservation['reservation_dateDeb']);
                $dateFin = date_create($reservation['reservation_dateFin']);
                echo '<td>' . date_format($dateDeb, 'd-m-Y') . ' au ' . date_format($dateFin, 'd-m-Y') . '</td>';
                echo '<td><a href="verifDelReservationUser.php?users=' . $_SESSION['user_id'] . '&parcelles=' . $reservation['parcelle_id'] . '">Annuler la reservation</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>

<a href="compte.php">Retour</a>
