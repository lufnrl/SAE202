<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';


?>
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
    </div>

    <br>

    <div>
       Vos parcelles
    </div>
    <div>
        <table border="1">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>description</th>
                <th>etat</th>
                <th>date de reservations</th>
            </tr>
            <?php
            $req = $bd->query('SELECT * FROM parcelles WHERE _user_id = '.$_SESSION['user_id'].'');
            //on récupère le résultat
            $resultat = $req->fetch();

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