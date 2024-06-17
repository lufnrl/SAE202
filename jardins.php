<?php
require('model/connectBD.php');
require('composants/head.php');
require('composants/header.php');

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

                    echo '<li class="location-item" data-photo="' . $jardin['jardin_photo'] . '" data-id="' . $jardin['jardin_id'] . '" data-name="' . $jardin['jardin_nom'] . '" data-adr="' . $jardin['jardin_adr'] . '" data-surface="' . $jardin['jardin_surface'] . '" data-info="' . $jardin['jardin_infoTerre'] . '" data-lat="' . $jardin['jardin_coordLat'] . '" data-lng="' . $jardin['jardin_coordLong'] . '" data-count-parcelles="' . $countParcelles . '" data-total-parcelles="' . $totalParcelles . '" data-etat="'.$etatParcelle.'" data-desc="'.$jardin['jardin_desc'].'" >';
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

<style>
    body {
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 0;
    }

    h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .container-jardins {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 100px auto;
        padding: 20px;
        max-width: 1100px;
        min-height: 100vh;
    }

    #map {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        width: 100%;
        border: 1px solid #f1f1f1;
    }

    #locations {
        width: 50%;
    }

    .location-item {
        cursor: pointer;
    }

    .location-image {
        width: 100%;
        height: 100px;
        border-radius: 10px;
    }

    #jardin-details {
        padding: 20px;
    }

    #jardin-info {
        margin-top: 20px;
    }

    .reservation-parcelle {
        padding: 20px;
        border: 1px solid #f1f1f1;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .infos-jardin-flex {
        display: flex;
        justify-content: space-between;
        flex-direction: row-reverse;
        align-items: start;
        gap: 50px;
    }

    .infos-jardin-flex img {
        border-radius: 10px;
        width: 500px;
    }

    .content-infojardins {
        width: 100%;
    }

    .content-infojardins h3 {
        font-family: "Inter", sans-serif;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .content-infojardins p {
        font-family: "Inter", sans-serif;
        font-size: 1rem;
    }

    .block-reservations {
        margin-top: 20px;
    }

    .flex-items-reservation {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .flex-items-info {
        display: flex;
        gap: 20px;
    }

    .badge-table {
        font-family: 'Inter', sans-serif;
        border-collapse: collapse;
        text-align: center;
        padding-top: .125rem;
        padding-bottom: .125rem;
        padding-left: .625rem;
        padding-right: .625rem;
        border-radius: .25rem;
        font-size: 12px;
        line-height: 1rem;
        font-weight: 500;
    }

    .attente {
        color: #92400E;
        background-color: #FEF3C7;
    }

    .libre {
        color: #0F5132;
        background-color: #D1E7DD;
    }

    .reserve {
        color: #C53030;
        background-color: #FED7D7;
    }

    .infos-parcelle-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #parcelles-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .reservation-parcelle a {
        margin-top: 10px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #5E7B51;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .location-description {
        font-size: 1rem;
        margin-bottom: 20px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const locations = document.querySelectorAll('.location-item');
        const jardinInfo = document.getElementById('jardin-info');
        const user_id = <?php echo json_encode($user_id); ?>;

        locations.forEach(location => {
            location.addEventListener('click', function() {
                const jardinId = this.dataset.id;
                const jardinName = this.dataset.name;
                const jardinDesc = this.dataset.desc;
                const jardinAdr = this.dataset.adr;
                const jardinSurface = this.dataset.surface;
                const jardinInfoTerre = this.dataset.info;
                const jardinLat = this.dataset.lat;
                const jardinLng = this.dataset.lng;
                const jardinPhoto = this.dataset.photo;
                const nbParcelleDispo = this.dataset.countParcelles;
                const nbParcelleTotal = this.dataset.totalParcelles;

                jardinInfo.innerHTML = `
                <div class="infos-jardin-flex">
                    <img src="/src/assets/uploads/${jardinPhoto}" alt="${jardinName}" style="max-width: 800px; border-radius: 10px;">
                    <div class="content-infojardins">
                        <div class="flex-items-reservation">
                            <h3>${jardinName}</h3>
                            <div class="flex-items-info">
                                <span class="badge badge-primary">Parcelles disponibles: ${nbParcelleDispo} / ${nbParcelleTotal}</span>
                            </div>
                        </div>
                        <p class="location-description">${jardinDesc}</p>
                        <p class="location-adresse-reservation">Adresse : ${jardinAdr}</p>
                        <p class="location-infos-reservation">Surface : ${jardinSurface} m²</p>
                        <p>Type de terre : ${jardinInfoTerre}</p>
                        <p>Coordonnées GPS : ${jardinLat}, ${jardinLng}</p>
                        <div class="block-reservations">
                            <h2>Parcelles disponibles</h2>
                            <div id="parcelles-info"></div>
                        </div>
                    </div>
                </div>
            `;

                // Fetching parcelles information
                fetchParcelles(jardinId, user_id);
            });
        });

        function fetchParcelles(jardinId, user_id) {
            const parcelles = <?php
                try {
                    $reqParcelles = $bd->query("SELECT * FROM parcelles");
                    echo json_encode($reqParcelles->fetchAll(PDO::FETCH_ASSOC));
                } catch (Exception $e) {
                    echo json_encode([]);
                }
                ?>;

            const filteredParcelles = parcelles.filter(parcelle => parcelle._jardin_id == jardinId);
            const parcellesInfo = document.getElementById('parcelles-info');

            if (filteredParcelles.length > 0) {
                parcellesInfo.innerHTML = filteredParcelles.map(parcelle => `
                <div class="reservation-parcelle">
                    <div class="infos-parcelle-flex">
                        <h4>${parcelle.parcelle_nom}</h4>
                        <span class="badge-table ${parcelle.parcelle_etat.toLowerCase()}">${parcelle.parcelle_etat}</span>
                    </div>
                    <p>Informations : ${parcelle.parcelle_content}</p>
                    ${user_id && (parcelle.parcelle_etat.toLowerCase() === 'libre') ?
                    `<a href="/parcelles/confirmReservation.php?users=${user_id}&parcelles=${parcelle.parcelle_id}">Réserver</a>` :
                    (parcelle.parcelle_etat.toLowerCase() !== 'libre' ? '<p>Parcelle indisponible</p>' : '<a href="/users/formConnexion.php">Connectez-vous pour réserver</a>')}
                </div>
            `).join('');
            } else {
                parcellesInfo.innerHTML = '<p>Aucune parcelle disponible dans ce jardin.</p>';
            }
        }
    });
</script>

<?php require("./composants/footer.php"); ?>

<script src="/src/assets/js/script.js"></script>
