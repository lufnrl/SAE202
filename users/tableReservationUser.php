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
                echo '<td>' . htmlspecialchars($reservation['parcelle_id']) . '</td>';
                echo '<td>' . htmlspecialchars($reservation['reservation_user_id']) . '</td>';
                echo '<td>' . htmlspecialchars($reservation['parcelle_nom']) . '</td>';
                echo '<td>' . htmlspecialchars($reservation['parcelle_content']) . '</td>';
                echo '<td>' . htmlspecialchars($reservation['parcelle_etat']) . '</td>';
                echo '<td>' . htmlspecialchars($reservation['parcelle_desc']) . '</td>';
                echo '<td>' . 'Du ' . htmlspecialchars($reservation['reservation_dateDeb']) . ' au ' . htmlspecialchars($reservation['reservation_dateFin']) . '</td>';
                echo '<td><a href="verifDelReservationUser.php?users=' . htmlspecialchars($_SESSION['user_id']) . '&parcelles=' . htmlspecialchars($reservation['parcelle_id']) . '">Annuler la reservation</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>

<a href="compte.php">Retour</a>
