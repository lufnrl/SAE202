<?php
require '../model/connectBD.php';
session_start();
?>
<div>
    Mon profil
</div>
<div>
    <div>
        <p>Photo de profil</p>
    </div>
    <div>
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
        <a href="#">Modifier mon profil</a>
        <a href="">supprimer mon compte</a>
    </div>

    <br>

    <div>
        Mes parcelles reservées
    </div>
    <div>
        <table>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>description</th>
                <th>etat</th>
                <th>date de reservations</th>
            </tr>
            <?php
            $requete = $bd->prepare('SELECT * FROM parcelles WHERE _user_id = ?');
            $requete->bind_param('i', $_SESSION["user_id"]);
            $requete->execute();
            $result = $requete->get_result();
            $parcelles = $result->fetch_all(MYSQLI_ASSOC);
            if (empty($parcelles)) {
                echo 'Vous n\'avez aucune parcelles.';
            } else {
                foreach ($parcelles as $parcelle) {
                    echo '<tr>';
                    echo '<td>' . $parcelle['parcelle_id'] . '</td>';
                    echo '<td>' . $parcelle['parcelle_content'] . '</td>';
                    echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
                    echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
                    echo '<td>' . 'Du ' . $parcelle['parcelle_dateDeb'] . ' au ' . $parcelle['parcelle_dateFin']. '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</div>