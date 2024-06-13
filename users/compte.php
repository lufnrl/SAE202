<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit();
}

?>
<h1>
    Mon profil
</h1>
<div>
    <div>
        <p>Photo de profil</p>
    </div>
    <div>
        <?php
        $query = "SELECT user_photo FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $req = $bd->query($query);
        $photo = $req->fetch()['user_photo'];
        echo '<img src="/src/assets/uploads/' . $photo . '" alt="Photo de profil" style="width:100px;">';
        ?>
        <span><?php echo $_SESSION['user_nom'] ?></span>
        <span><?php echo $_SESSION['user_prnm'] ?></span>
        <span><?php echo $_SESSION['user_login'] ?></span>
    </div>
    <div>
        <p><?php echo $_SESSION['user_email'] ?></p>
    </div>
    <div>
    </div>
    <div>
        <a href='modifProfil.php?users=<?php echo $_SESSION['user_id'] ?>'>Modifier mon profil</a>
        <a href='verifDelCompte.php?users=<?php echo $_SESSION['user_id'] ?>'>Supprimer mon compte</a>
        <a href='tableReservationUser.php'>Mes réservations</a>
        <a href='/jardins.php'>Nouvelle réservation</a>
        <a href="/jardins/formJardinUser.php">Ajouter un jardin</a>
        <a href="/parcelles/formParcelleUser.php">Ajouter une parcelle</a>
    </div>

    <br>

    <h2>
        Mes parcelles
    </h2>
    <div>
        <table border="1">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>contenu</th>
                <th>description</th>
                <th>etat</th>
                <th colspan="2">action</th>
            </tr>
            <?php
            // afficher les parcelles que possede l'utilisateur avec le _user_id ne PDO
            $requete = $bd->prepare('SELECT * FROM parcelles WHERE _user_id = ?');
            $requete->bindParam(1, $_SESSION["user_id"]);
            $requete->execute();
            $parcelles = $requete->fetchAll(PDO::FETCH_ASSOC);
            if (empty($parcelles)) {
                echo 'Vous n\'avez aucune parcelles.';
            } else {
                foreach ($parcelles as $parcelle) {
                    echo '<tr>';
                    echo '<td>' . $parcelle['parcelle_id'] . '</td>';
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
    </div>

    <h2>
        Mes jardins
    </h2>
    <div>
        <table border="1">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>surface</th>
                <th>nombre de parcelles</th>
                <th>adresse</th>
                <th>ville</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>photo</th>
                <th>maps</th>
                <th>infoTerre</th>
                <th colspan="2">action</th>
            </tr>
            <?php
            // afficher les jardins que possede l'utilisateur avec le _user_id ne PDO
            $requete = $bd->prepare('SELECT * FROM jardins WHERE _user_id = ?');
            $requete->bindParam(1, $_SESSION["user_id"]);
            $requete->execute();
            $jardins = $requete->fetchAll(PDO::FETCH_ASSOC);
            if (empty($jardins)) {
                echo 'Vous n\'avez aucun jardin.';
            } else {
                foreach ($jardins as $jardin) {
                    echo '<tr>';
                    echo '<td>' . $jardin['jardin_id'] . '</td>';
                    echo '<td>' . $jardin['jardin_nom'] . '</td>';
                    echo '<td>' . $jardin['jardin_surface'] . '</td>';
                    echo '<td>' . $jardin['jardin_nbParcelles'] . '</td>';
                    echo '<td>' . $jardin['jardin_adr'] . '</td>';
                    echo '<td>' . $jardin['jardin_ville'] . '</td>';
                    echo '<td>' . $jardin['jardin_coordLat'] . '</td>';
                    echo '<td>' . $jardin['jardin_coordLong'] . '</td>';
                    echo '<td><img src="/src/assets/uploads/' . $jardin['jardin_photo'] . '" alt="Photo de jardin" style="width:100px;"></td>';
                    echo '<td>' . $jardin['jardin_maps'] . '</td>';
                    echo '<td>' . $jardin['jardin_infoTerre'] . '</td>';
                    echo '<td><a href="/jardins/modifJardinUser.php?jardins=' . $jardin['jardin_id'] . '">Modifier</a></td>';
                    echo '<td><a href="/jardins/verifDelJardinUser.php?jardins=' . $jardin['jardin_id'] . '">Supprimer</a></td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
    <?php
    if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
        ?>
        <div>
            <p>
                <?php
                echo $_SESSION['alert_message'];
                ?>
            </p>
        </div>
        <?php
    }
    ?>
</div>

<?php
require('../composants/footer.php');
?>