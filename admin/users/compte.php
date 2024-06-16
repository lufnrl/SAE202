<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';

$user_id = $_GET['users'];

$req = $bd->query("SELECT * FROM users WHERE user_id = '" . $user_id . "'");
$user = $req->fetch();

?>
    <h1>
        Profil de <?php echo $user['user_nom'] . ' ' . $user['user_prnm'] ?>
    </h1>
    <div>
        <div>
            <?php
            echo '<img src="/src/assets/uploads/' . $user['user_photo'] . '" alt="Photo de profil" style="width:100px;">';
            ?>
            <span><?php echo $user['user_nom'] ?></span>
            <span><?php echo $user['user_prnm'] ?></span>
            <span><?php echo $user['user_login'] ?></span>
        </div>
        <div>
            <p><?php echo $user['user_email'] ?></p>
        </div>
        <div>
        </div>

        <h2>
            Parcelles
        </h2>
        <div>
            <table border="1">
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>contenu</th>
                    <th>description</th>
                    <th>etat</th>
                </tr>
                <?php
                // afficher les parcelles que possede l'utilisateur avec le _user_id ne PDO
                $req = $bd->query("SELECT * FROM parcelles WHERE _user_id = '" . $user_id . "'");
                $parcelles = $req->fetchAll(PDO::FETCH_ASSOC);
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
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </div>

        <h2>
            Jardins
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
                </tr>
                <?php
                // afficher les jardins que possede l'utilisateur avec le _user_id ne PDO
                $req = $bd->query("SELECT * FROM jardins WHERE _user_id = '" . $user_id . "'");
                $jardins = $req->fetchAll(PDO::FETCH_ASSOC);
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
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </div>
    </div>

<?php
require('../../composants/footer.php');
?>