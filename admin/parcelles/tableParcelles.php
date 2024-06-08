<?php
require '../../model/connectBD.php';
session_start();

$req = $bd->query("SELECT * FROM parcelles");
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Toute les parcelles</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Contenu</th>
        <th>Description</th>
        <th>Etat</th>
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
    // modifier une parcelle
    echo '<td><a href="parcelle.php?parcelles=' . $parcelle['parcelle_id'] . '">Modifier</a>';
    echo '</tr>';
}
?>
</table>

<h1>Parcelles en attente de validation</h1>

<?php
$req = $bd->query("SELECT * FROM parcelles WHERE parcelle_etat = 'ATTENTE'");
$parcelles = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
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
