<?php
    require('model/connectBD.php');
    require('composants/head.php');
    require('composants/header.php');
?>


<h1>Réservation</h1>


<div id="map-container">
    <div id="map"></div>
    <div id="locations">
        <ul id="location-list">
            <?php
            $stmt = $bd->query("SELECT * FROM jardins");
            $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($locations as $location): ?>
                <li data-lat="<?= $location['jardin_coordLat'] ?>" data-lng="<?= $location['jardin_coordLong'] ?>" data-name="<?= $location['jardin_nom'] ?>" data-adr="<?= $location['jardin_adr'] ?>" data-gmaps="<?= $location['jardin_maps'] ?>">
                    <?= $location['jardin_nom'] ?>
                    <br>
                    <?= $location['jardin_adr'] ?>
                    <br>
                    <?php
                    $stmt_parcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
                    $stmt_parcelles->execute([$location['jardin_id']]);
                    $parcelles = $stmt_parcelles->fetchAll(PDO::FETCH_ASSOC);
                    $etats = [];
                    foreach ($parcelles as $parcelle) {
                        $etats[] = $parcelle['parcelle_etat'];
                    }
                    $etats_str = implode(', ', $etats);
                    ?>
                    <small>États des parcelles : <?= $etats_str ?></small>
                    <br>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<td><a href="verifReservation.php?users='.$_SESSION['user_id'].'&parcelles='.$parcelle['parcelle_id'].'">Réserver</a></td>';
                    } else {
                        echo '<td><a href="/users/formConnexion.php">Connectez-vous pour réserver</a></td>';
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require("./composants/footer.php") ?>

<script src="./src/assets/js/script.js"></script>