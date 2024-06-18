<?php

$titre = 'Réservation de parcelles de jardins';
$desc = 'Page de reservation de parcelles de jardins';

require('model/connectBD.php');
require('composants/head.php');
require('composants/header.php');

$title = "Jardins";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<div class="container-jardins">
    <h1>Tous les jardins de Troyes et des alentours</h1>
    <div id="map-container">
        <div id="map"></div>
        <div id="locations">
            <ul id="location-list">
                <?php
                if ($user_id) {
                    $reqJardins = $bd->prepare("SELECT * FROM jardins WHERE _user_id != ?");
                    $reqJardins->execute([$user_id]);
                } else {
                    $reqJardins = $bd->query("SELECT * FROM jardins");
                }

                $jardins = $reqJardins->fetchAll(PDO::FETCH_ASSOC);

                foreach ($jardins as $jardin) {
                    // Comptage des parcelles disponibles et totales
                    $reqCountParcelles = $bd->prepare("SELECT COUNT(*) AS count FROM parcelles WHERE _jardin_id = ? AND parcelle_etat = 'LIBRE'");
                    $reqCountParcelles->execute([$jardin['jardin_id']]);
                    $countParcelles = $reqCountParcelles->fetch(PDO::FETCH_ASSOC);
                    $countParcelles = $countParcelles ? $countParcelles['count'] : 0;

                    $countTotalParcelles = $bd->prepare("SELECT COUNT(*) AS count FROM parcelles WHERE _jardin_id = ?");
                    $countTotalParcelles->execute([$jardin['jardin_id']]);
                    $totalParcelles = $countTotalParcelles->fetch(PDO::FETCH_ASSOC);
                    $totalParcelles = $totalParcelles ? $totalParcelles['count'] : 0;

                    $etatParcelles = $bd->prepare("SELECT parcelle_etat FROM parcelles WHERE _jardin_id = ?");
                    $etatParcelles->execute([$jardin['jardin_id']]);
                    $etatParcelle = $etatParcelles->fetch(PDO::FETCH_ASSOC);
                    $etatParcelle = $etatParcelle ? $etatParcelle['parcelle_etat'] : '';

                    echo '<li class="location-item" data-photo="' . $jardin['jardin_photo'] . '" data-id="' . $jardin['jardin_id'] . '" data-name="' . $jardin['jardin_nom'] . '" data-adr="' . $jardin['jardin_adr'] . '" data-surface="' . $jardin['jardin_surface'] . '" data-info="' . $jardin['jardin_infoTerre'] . '" data-lat="' . $jardin['jardin_coordLat'] . '" data-lng="' . $jardin['jardin_coordLong'] . '" data-count-parcelles="' . $countParcelles . '" data-total-parcelles="' . $totalParcelles . '" data-etat="'.$etatParcelle.'" data-desc="'.$jardin['jardin_desc'].'" data-gmaps="'.$jardin['jardin_maps'].'" >';
                    echo '<div class="location-image" style="background: url(\'/src/assets/uploads/' . $jardin['jardin_photo'] . '\'); background-size: cover; background-position: center;"></div>';
                    echo '<h6>' . $jardin['jardin_nom'] . '</h6>';
                    echo '<p class="location-adresse"><i class="fas fa-map-marker-alt"></i> ' . $jardin['jardin_adr'] . '</p>';
                    echo '<div class="location-infos">';
                    echo '<p>Surface : ' . $jardin['jardin_surface'] . ' m2</p>';
                    echo '<p>Type : ' . $jardin['jardin_infoTerre'] . '</p>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <div id="jardin-details">
        <h2>Informations supplémentaires</h2>
        <hr>
        <div id="jardin-info"></div>
    </div>
</div>

<?php require("./composants/footer.php"); ?>
