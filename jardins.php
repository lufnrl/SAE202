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
                    
                    echo '<div class="location-image" style="background: url(\'./src/assets/img/' . $jardin['jardin_photo'] . '\'); background-size: cover; background-position: center;"></div>';
                    echo '<h6>' . $jardin['jardin_nom'] . '</h6>';
                    echo '<p class="location-adresse"><i class="fas fa-map-marker-alt"></i> ' . $jardin['jardin_adr'] . '</p>';
                    echo '<div class="location-infos">';
                    echo '<p>Surface : ' . $jardin['jardin_surface'] . ' m2</p>';
                    echo '<p>Type : ' . $jardin['jardin_infoTerre'] . '</p>';
                    echo '</div>';
                    echo '<details>';
                    echo '<summary>Parcelles</summary>';
                    
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