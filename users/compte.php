<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';


?>
<br>
<br>
<br>
<br>
<br>
<br>
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
        <a href='modifierProfil.php?users=<?php echo $_SESSION['user_id'] ?>'>Modifier mon profil</a>
        <a href='verifDelCompte.php?users=<?php echo $_SESSION['user_id'] ?>'>Supprimer mon compte</a>
        <a href='tableReservationUser.php'>Mes réservations</a>
        <a href='../jardins.php'>Nouvelle réservation</a>
    </div>

    <br>

    <div>
        Mes parcelles
    </div>
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
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</div>