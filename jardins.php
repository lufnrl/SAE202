<?php
require('model/connectBD.php');
require('composants/head.php');
require('composants/header.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

?>

<h1>Réservation</h1>

<div class="container">
    <div id="map-container">
        <div id="map"></div>
        <div id="locations">
            <ul id="location-list">
                <?php
                if ($user_id) {
                    // Afficher tous les jardins sauf ceux de l'utilisateur connecté
                    $reqJardins = $bd->prepare("SELECT * FROM jardins WHERE _user_id != ?");
                    $reqJardins->execute([$user_id]);
                } else {
                    // Afficher tous les jardins
                    $reqJardins = $bd->query("SELECT * FROM jardins");
                }

                $jardins = $reqJardins->fetchAll(PDO::FETCH_ASSOC);

                foreach ($jardins as $jardin) {
                    echo '<li data-lat="' . $jardin['jardin_coordLat'] . '" data-lng="' . $jardin['jardin_coordLong'] . '" data-name="' . $jardin['jardin_nom'] . '" data-adr="' . $jardin['jardin_adr'] . '" data-gmaps="' . $jardin['jardin_maps'] . '">';
                    echo '<div class="location-image" style="background: url(\'/src/assets/uploads/' . $jardin['jardin_photo'] . '\'); background-size: cover; background-position: center;"></div>';
                    echo '<h6>' . $jardin['jardin_nom'] . '</h6>';
                    echo '<p class="location-adresse"><i class="fas fa-map-marker-alt"></i> ' . $jardin['jardin_adr'] . '</p>';
                    echo '<div class="location-infos">';
                    echo '<p>Surface : ' . $jardin['jardin_surface'] . ' m2</p>';
                    echo '<p>Type : ' . $jardin['jardin_infoTerre'] . '</p>';
                    echo '</div>';
                    echo '<details>';

                    $reqCountParcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ? AND parcelle_etat = 'LIBRE'");
                    $reqCountParcelles->execute([$jardin['jardin_id']]);
                    $countParcelles = $reqCountParcelles->fetchAll(PDO::FETCH_ASSOC);

                    $countTotalParcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
                    $countTotalParcelles->execute([$jardin['jardin_id']]);
                    $totalParcelles = $countTotalParcelles->fetchAll(PDO::FETCH_ASSOC);

                    echo '<summary>Parcelles ' . count($countParcelles) . '/' . count($totalParcelles) . '</summary>';

                    echo '<div class="location-parcelles-reservation">';
                    $stmt_parcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
                    $stmt_parcelles->execute([$jardin['jardin_id']]);
                    $parcelles = $stmt_parcelles->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($parcelles as $parcelle) {
                        echo '<p>' . $parcelle['parcelle_nom'] . ' ' . $parcelle['parcelle_etat'] . '</p>';
                        if ($parcelle['parcelle_etat'] === 'ATTENTE' || $parcelle['parcelle_etat'] === 'RESERVE') {
                            echo 'parcelle indisponible';
                        } elseif ($parcelle['parcelle_etat'] === 'LIBRE') {
                            if ($user_id) {
                                echo '<a href="/parcelles/confirmReservation.php?users=' . $user_id . '&parcelles=' . $parcelle['parcelle_id'] . '">Réserver</a>';
                            } else {
                                echo '<a href="/users/formConnexion.php">Connectez-vous pour réserver</a>';
                            }
                        }
                    }

                    echo '</div>';
                    echo '</details>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php require("./composants/footer.php"); ?>

<script src="./src/assets/js/script.js"></script>