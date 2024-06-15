<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit();
}
?>

<h1 id="profile-title">Mon profil</h1>

<div id="profile-container">
    <div id="profile-nav">
        <button class="nav-button" data-target="profile-info">Mes Informations</button>
        <button class="nav-button" data-target="profile-parcelles">Mes Parcelles</button>
        <button class="nav-button" data-target="profile-jardins">Mes Jardins</button>
        <button class="nav-button" data-target="profile-actions">Mes Réservations</button>
    </div>

    <div id="profile-content">
        <div id="profile-info" class="profile-section">
            <h2 class="section-title">Mes Informations</h2>
            <div class="profile-info">
                <?php
                $query = "SELECT user_photo FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
                $req = $bd->query($query);
                $photo = $req->fetch()['user_photo'];
                echo '<img class="profile-photo" src="/src/assets/uploads/' . $photo . '" alt="Photo de profil">';
                ?>
                <div class="profile-text">
                    <p class="profile-name"><span>Nom : </span><?php echo $_SESSION['user_nom'] ?></p>
                    <p class="profile-name"><span>Prénom : </span><?php echo $_SESSION['user_prnm'] ?></p>
                    <p class="profile-login"><span>Nom d'utilisateur : </span><?php echo $_SESSION['user_login'] ?></p>
                    <p class="profile-mail"><span>Adresse mail : </span><?php echo $_SESSION['user_email'] ?></p>
                </div>
            </div>
            <div class="profile-links">
                <a class="profile-action-link" href='modifProfil.php?users=<?php echo $_SESSION['user_id'] ?>'>Modifier mon profil</a>
                <a class="profile-action-link" href='verifDelCompte.php?users=<?php echo $_SESSION['user_id'] ?>'>Supprimer mon compte</a>
            </div>
        </div>
        
        <div id="profile-parcelles" class="profile-section">
            <h2 class="section-title">Mes parcelles</h2>
            <table class="profile-table">
                <tr>
                    <th>Nom</th>
                    <th>Contenu</th>
                    <th>Description</th>
                    <th>Etat</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                $requete = $bd->prepare('SELECT * FROM parcelles WHERE _user_id = ?');
                $requete->bindParam(1, $_SESSION["user_id"]);
                $requete->execute();
                $parcelles = $requete->fetchAll(PDO::FETCH_ASSOC);
                if (empty($parcelles)) {
                    echo '<tr><td colspan="7">Vous n\'avez aucune parcelle.</td></tr>';
                } else {
                    foreach ($parcelles as $parcelle) {
                        echo '<tr>';
                        echo '<td>' . $parcelle['parcelle_nom'] . '</td>';
                        echo '<td>' . $parcelle['parcelle_content'] . '</td>';
                        echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
                        echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
                        echo '<td><a href="/parcelles/modifParcelleUser.php?parcelles=' . $parcelle['parcelle_id'] . '">Modifier</a></td>';
                        echo '<td><a href="/parcelles/verifDelParcelle.php?parcelles=' . $parcelle['parcelle_id'] . '">Supprimer</a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
            <a class="profile-action-link" href="/parcelles/formParcelleUser.php">Ajouter une parcelle</a>
        </div>
        
        <div id="profile-jardins" class="profile-section">
            <h2 class="section-title">Mes jardins</h2>
            <table class="profile-table">
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Surface</th>
                    <th>Nombre de parcelles</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Maps</th>
                    <th>Informations</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                $requete = $bd->prepare('SELECT * FROM jardins WHERE _user_id = ?');
                $requete->bindParam(1, $_SESSION["user_id"]);
                $requete->execute();
                $jardins = $requete->fetchAll(PDO::FETCH_ASSOC);
                if (empty($jardins)) {
                    echo '<tr><td colspan="13">Vous n\'avez aucun jardin.</td></tr>';
                } else {
                    foreach ($jardins as $jardin) {
                        echo '<tr>';
                        echo '<td><img class="jardin-photo" src="/src/assets/uploads/' . $jardin['jardin_photo'] . '" alt="Photo de jardin"></td>';
                        echo '<td>' . $jardin['jardin_nom'] . '</td>';
                        echo '<td>' . $jardin['jardin_adr'] . '</td>';
                        echo '<td>' . $jardin['jardin_ville'] . '</td>';
                        echo '<td>' . $jardin['jardin_surface'] . '</td>';
                        echo '<td>' . $jardin['jardin_nbParcelles'] . '</td>';
                        echo '<td>' . $jardin['jardin_coordLat'] . '</td>';
                        echo '<td>' . $jardin['jardin_coordLong'] . '</td>';
                        echo '<td>' . $jardin['jardin_maps'] . '</td>';
                        echo '<td>' . $jardin['jardin_infoTerre'] . '</td>';
                        echo '<td><a href="/jardins/modifJardinUser.php?jardins=' . $jardin['jardin_id'] . '">Modifier</a></td>';
                        echo '<td><a href="/jardins/verifDelJardinUser.php?jardins=' . $jardin['jardin_id'] . '">Supprimer</a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
            <a class="profile-action-link" href="/jardins/formJardinUser.php">Ajouter un jardin</a>
        </div>
        
        <div id="profile-actions" class="profile-section">
            <h2 class="section-title">Mes réservations</h2>
            <?php
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

            <div>
                <table class="profile-table">
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
                            echo '<td>' . $reservation['parcelle_id'] . '</td>';
                            echo '<td>' . $reservation['reservation_user_id'] . '</td>';
                            echo '<td>' . $reservation['parcelle_nom'] . '</td>';
                            echo '<td>' . $reservation['parcelle_content'] . '</td>';
                            echo '<td>' . $reservation['parcelle_etat'] . '</td>';
                            echo '<td>' . $reservation['parcelle_desc'] . '</td>';
                            // changer le format de la date de réservation de yyyy-mm-dd à dd-mm-yyyy
                            $dateDeb = date_create($reservation['reservation_dateDeb']);
                            $dateFin = date_create($reservation['reservation_dateFin']);
                            echo '<td>' . date_format($dateDeb, 'd-m-Y') . ' au ' . date_format($dateFin, 'd-m-Y') . '</td>';
                            echo '<td><a href="verifDelReservationUser.php?users=' . $_SESSION['user_id'] . '&parcelles=' . $reservation['parcelle_id'] . '">Annuler la reservation</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </table>
            </div>                                              

            <a class="profile-action-link" href='/jardins.php'>Nouvelle réservation</a>
        </div>

        <?php
        if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
            ?>
            <div class="alert <?php echo $_SESSION['alert_type']; ?>">
                <p><?php echo $_SESSION['alert_message']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
require '../composants/footer.php';
?>

<script>

document.addEventListener('DOMContentLoaded', () => {
    const navButtons = document.querySelectorAll('.nav-button');
    const sections = document.querySelectorAll('.profile-section');

    console.log('Nav buttons:', navButtons);
    console.log('Sections:', sections);

    // Function to show the section based on the button clicked
    const showSection = (targetId) => {
        console.log('Section affichée:', targetId);
        sections.forEach(section => {
            if (section.id === targetId) {
                section.style.display = 'block';  // Show the selected section
            } else {
                section.style.display = 'none';   // Hide all other sections
            }
        });
    };

    // Attach click event listeners to nav buttons
    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-target');
            console.log('Click:', target);
            showSection(target);  // Call the showSection function with the target section id
        });
    });

    // Show the first section by default
    if (sections.length > 0) {
        console.log('Première section:', sections[0].id);
        showSection(sections[0].id);  // Show the first section initially
    }
});

</script>