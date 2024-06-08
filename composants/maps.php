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

<style>
    #map-container {
        display: flex;
        padding: 50px;
        align-items: start;
        justify-content: center;
    }

    #map {
        width: 50%;
        height: 1000px;
        margin: 0px 100px 100px 100px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 20px;
    }

    #locations {
        width: 30%;
        height: 1000px;
        overflow-y: auto;
        padding: 10px;
        box-shadow: -2px 0 5px rgba(0,0,0,0.1);
    }

    #location-list {
        list-style: none;
        padding: 0;
    }

    #location-list li {
        cursor: pointer;
        padding: 5px;
        border-bottom: 1px solid #ccc;
    }

    #location-list li:hover {
        background-color: #f0f0f0;
    }

</style>

<script>
    // Initialisation de la carte
    var map = L.map('map').setView([48.8566, 2.3522], 13); // Coordonnées de Paris

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Récupération des localisations depuis le DOM
    var locations = document.querySelectorAll('#location-list li');
    locations.forEach(location => {
        var lat = location.getAttribute('data-lat');
        var lng = location.getAttribute('data-lng');
        var name = location.getAttribute('data-name');
        var adr = location.getAttribute('data-adr');
        var gmaps = location.getAttribute('data-gmaps');

        // Création de chaque marqueur sur la carte avec un popup différent
        var marker = L.marker([lat, lng]).addTo(map)
            .bindPopup('<strong>' + name + '</strong><br>' + adr + '<br><a href="' + gmaps + '" target="_blank">Voir sur Google Maps</a>');

        // Ajout d'un événement de clic pour centrer la carte et ouvrir le popup
        location.addEventListener('click', () => {
            map.setView([lat, lng], 15);
            marker.openPopup();
        });
    });
</script>