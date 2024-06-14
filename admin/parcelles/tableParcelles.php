<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';
session_start();

$req = $bd->query("SELECT * FROM parcelles");
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Toute les parcelles</h1>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Contenu</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Jardins</th>
        <th>Actions</th>
    </tr>
    <?php

foreach ($parcelles as $parcelle) {
    echo '<tr>';
    echo '<td>' . $parcelle['parcelle_id'] . '</td>';
    echo '<td>' . $parcelle['parcelle_nom'] . '</td>';
    echo '<td>' . $parcelle['parcelle_content'] . '</td>';
    echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
    echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
    $query = "SELECT * FROM jardins WHERE jardin_id = '" . $parcelle['_jardin_id'] . "'";
    $req = $bd->query($query);
    $jardins = $req->fetchAll();
    echo '<td>'. $jardins[0]['jardin_nom'] . '</td>';
    echo '<td><a href="modifParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '">Modifier</a>';
    echo '<a href="verifDelParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '">Supprimer</a></td>';
    echo '</tr>';
}
?>
</table>

<h1>Parcelles en attente de validation</h1>

<?php
$req = $bd->query("SELECT * FROM parcelles WHERE parcelle_etat = 'ATTENTE'");
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Contenu</th>
        <th>Description</th>
        <th>Etat</th>
        <th>Actions</th>
    </tr>
    <?php

    if (empty($parcelles)) {
        echo '<tr><td colspan="6">Aucune parcelle n\'est en attente de validation.</td></tr>';
    } else {
        foreach ($parcelles as $parcelle) {
            echo '<tr>';
            echo '<td>' . $parcelle['parcelle_id'] . '</td>';
            echo '<td>' . $parcelle['parcelle_nom'] . '</td>';
            echo '<td>' . $parcelle['parcelle_content'] . '</td>';
            echo '<td>' . $parcelle['parcelle_desc'] . '</td>';
            echo '<td>' . $parcelle['parcelle_etat'] . '</td>';
            // accepter la parcelle
            echo '<td><a href="acceptParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '">Accepter</a>';
            // refuser la parcelle
            echo '<a href="refuseParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '">Refuser</a></td>';
            echo '</tr>';
        }
    }

?>
</table>

<?php
require('../../composants/footer.php');
?>
