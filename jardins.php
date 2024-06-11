<?php
    require('model/connectBD.php');
    require('composants/head.php');
    require('composants/header.php');
?>


<h1>Réservation</h1>


<div class="container">
    <div id="map-container">
        <div id="map"></div>
        <div id="locations">
            <ul id="location-list">
                <?php
                if (isset($_SESSION['user_id'])) {
                    // Sélectionner les jardins qui n'appartiennent pas à l'utilisateur connecté
                    $stmt = $bd->prepare("SELECT j.* FROM jardins j LEFT JOIN parcelles p ON j.jardin_id = p._jardin_id WHERE p._user_id != ? ORDER BY j.jardin_id ASC");
                    $stmt->execute([$_SESSION['user_id']]);
                    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    // Si l'utilisateur n'est pas connecté, afficher tous les jardins
                    $stmt = $bd->query("SELECT * FROM jardins ORDER BY jardin_id ASC");
                    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                foreach ($locations as $location): ?>
                    <li data-lat="<?= $location['jardin_coordLat'] ?>" data-lng="<?= $location['jardin_coordLong'] ?>" data-name="<?= $location['jardin_nom'] ?>" data-adr="<?= $location['jardin_adr'] ?>" data-gmaps="<?= $location['jardin_maps'] ?>">
                        <?= $location['jardin_id'] ?>
                        <br>
                        <?= $location['jardin_nom'] ?>
                        <br>
                        <?= $location['jardin_adr'] ?>
                        <br>
                        <?php
                        if ($location['jardin_nbParcelles'] > 1) {
                            // Si le jardin a plus d'une parcelle, afficher un menu déroulant pour sélectionner les parcelles
                            echo '<select class="parcelle-select">';
                            // Récupérer les parcelles associées à ce jardin
                            $stmt_parcelles = $bd->prepare("SELECT parcelle_id, parcelle_nom FROM parcelles WHERE _jardin_id = ?");
                            $stmt_parcelles->execute([$location['jardin_id']]);
                            $parcelles = $stmt_parcelles->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($parcelles as $parcelle) {
                                echo '<option value="' . $parcelle['parcelle_id'] . '">' . $parcelle['parcelle_nom'] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            // Si le jardin a une seule parcelle, afficher simplement le nom de la parcelle
                            $stmt_parcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
                            $stmt_parcelles->execute([$location['jardin_id']]);
                            $parcelle = $stmt_parcelles->fetch(PDO::FETCH_ASSOC);
                            echo $parcelle['parcelle_nom'];
                        }
                        ?>
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
                        if ($parcelle['parcelle_etat'] == 'RESERVE' || $parcelle['parcelle_etat'] == 'ATTENTE') {
                            echo '';
                        }else if (isset($_SESSION['user_id'])) {
                            echo '<td><a href="/parcelles/confirmReservation.php?users='.$_SESSION['user_id'].'&parcelles='.$parcelle['parcelle_id'].'">Réserver</a></td>';
                        } else {
                            echo '<td><a href="/users/formConnexion.php">Connectez-vous pour réserver</a></td>';
                        }
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require("./composants/footer.php") ?>

<script src="./src/assets/js/script.js"></script>

<style>
    body {
        background-color: #f5efe6;
    }

    #link-inscription {
        background-color: #84A170;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    .container {
        max-width: 90vw;
        margin: 100px auto;
        padding: 0 20px;
    }

    #map-container {
        display: flex;
        justify-content: space-between;
    }

    #map {
        width: 70%;
        height: 500px;
        border-radius: 20px;
        margin-right: 50px;
    }

    #locations {
        width: 30%;
        margin-left: 50px;
        box-shadow: none;
    }

    #location-list {
        list-style-type: none;
        padding: 0;
    }

    #location-list li {
        margin: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
    }

    #location-list li select {
        margin-bottom: 10px;
    }

    #footer-reseaux-sociaux {
        background-color: #84A170;
    }

    #footer-colonne {
        background-color: #84A170;
    }

    #footer-mentions-legales {
        background-color: #84A170;
    }
</style>