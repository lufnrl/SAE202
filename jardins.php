<?php
require('model/connectBD.php');
require('composants/head.php');
require('composants/header.php');

// Vérifie si l'utilisateur est connecté
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<h1>Réservation</h1>

<div class="container">
    <div id="map-container">
        <div id="map"></div>
        <div id="locations">
            <ul id="location-list">
                <?php
                // Afficher les jardins et dans une balise details si il y a plusieurs parcelles par jardins.
                $reqJardins = $bd->query("SELECT * FROM jardins");
                $jardins = $reqJardins->fetchAll(PDO::FETCH_ASSOC);

                foreach ($jardins as $jardin) {
                    echo '<li data-lat="' . $jardin['jardin_coordLat'] . '" data-lng="' . $jardin['jardin_coordLong'] . '" data-name="' . $jardin['jardin_nom'] . '" data-adr="' . $jardin['jardin_adr'] . '" data-gmaps="' . $jardin['jardin_maps'] . '">';
                    echo '<p>' . $jardin['jardin_nom'] . '</p>';
                    echo '<p>' . $jardin['jardin_adr'] . '</p>';

                    echo '<details>';
                    echo '<summary>Réserver une parcelle</summary>';
                    $stmt_parcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
                    $stmt_parcelles->execute([$jardin['jardin_id']]);
                    $parcelles = $stmt_parcelles->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($parcelles as $parcelle) {
                        echo '<p>' . $parcelle['parcelle_nom'] . ' ' . $parcelle['parcelle_etat'] . '</p>';
                        if ($parcelle['parcelle_etat'] === 'ATTENTE' || $parcelle['parcelle_etat'] === 'RESERVE') {
                            echo'parcelle indisponible';
                        } else if($user_id) {
                            echo '<a href="/parcelles/confirmReservation.php?users=' . $user_id . '&parcelles=' . $parcelle['parcelle_id'] . '">Réserver</a>';
                        } else {
                            echo '<a href="/users/formConnexion.php">Connecter vous pour réserver</a>';
                        }
                    }
                    echo '</details>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php require("./composants/footer.php") ?>

<script src="./src/assets/js/script.js"></script>