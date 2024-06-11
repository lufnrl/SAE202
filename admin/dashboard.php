<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/headerAdmin.php';
?>

<br>
<br>
<br>
<br>
<br>
<h1>Dashboard</h1>

<a href="parcelles/tableParcelles.php">
    <div>Parcelles disponibles</div>
    <div>
        <span>
            <?php
            $req = $bd->query("SELECT COUNT(*) FROM parcelles WHERE parcelle_etat = 'LIBRE'");
            $jardins = $req->fetch(PDO::FETCH_ASSOC);
            echo $jardins['COUNT(*)'];
            ?>
        </span>
    </div>
</a>
<a href="parcelles/tableParcelles.php">
    <div>Parcelles en attentes de validation</div>
    <div>
        <span>
            <?php
            $req = $bd->query("SELECT COUNT(*) FROM parcelles WHERE parcelle_etat = 'ATTENTE'");
            $jardins = $req->fetch(PDO::FETCH_ASSOC);
            echo $jardins['COUNT(*)'];
            ?>
        </span>
    </div>
</a>
<a href="parcelles/tableParcelles.php">
    <div>Parcelles réservés</div>
    <div>
        <span>
            <?php
            $req = $bd->query("SELECT COUNT(*) FROM parcelles WHERE parcelle_etat = 'RESERVE'");
            $jardins = $req->fetch(PDO::FETCH_ASSOC);
            echo $jardins['COUNT(*)'];
            ?>
        </span>
    </div>
</a>
<a href="users/tableUsers.php">
    <div>Nombres d'utilisateurs</div>
    <div>
        <span>
            <?php
            $req = $bd->query("SELECT COUNT(*) FROM users");
            $jardins = $req->fetch(PDO::FETCH_ASSOC);
            echo $jardins['COUNT(*)'];
            ?>
        </span>
    </div>
</a>