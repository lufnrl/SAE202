<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

session_start(); // Assurez-vous que la session est démarrée

if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour voir les parcelles disponibles.";
    exit();
}

$userId = $_SESSION['user_id'];

// Utilisation de PDO
$query = "SELECT * FROM parcelles WHERE parcelle_etat = 'LIBRE' AND _user_id != :userId";
$req = $bd->prepare($query);
$req->bindParam(':userId', $userId, PDO::PARAM_INT); // Lier le paramètre userId
$req->execute(); // Exécuter la requête

// Récupérer les résultats
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<br>
<br>
<br>
<div>
    <h2>Parcelles disponibles</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Contenu</th>
            <th>Description</th>
            <th>État</th>
            <th>Période</th>
            <th>Action</th>
        </tr>

        <?php
        if (empty($parcelles)) {
            echo '<tr><td colspan="6">Aucune parcelle n\'est disponible.</td></tr>';
        } else {
            foreach ($parcelles as $parcelle) {
                echo '<tr>';
                echo '<td>' . $parcelle['parcelle_id'] . '</td>';
                echo '<td>' . $parcelle['parcelle_content'] . '</td>';
                echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
                echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
                echo '<td>Du ' . $parcelle['parcelle_dateDeb'] . ' au ' . htmlspecialchars($parcelle['parcelle_dateFin']) . '</td>';
                if (isset($_SESSION['user_id'])) {
                    echo '<td><a href="verifReservation.php?users='.htmlspecialchars($_SESSION['user_id']).'&parcelles='.htmlspecialchars($parcelle['parcelle_id']).'">Réserver</a></td>';
                } else {
                    echo '<td><a href="/users/formConnexion.php">Connectez-vous pour réserver</a></td>';
                }
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>