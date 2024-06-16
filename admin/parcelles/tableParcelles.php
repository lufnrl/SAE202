<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';

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
    echo '<td><a href="modifParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '"><svg clip-rule="evenodd" fill="currentColor" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-7.403-3.398 9.124-9.125c.171-.171.279-.423.279-.684 0-.229-.083-.466-.28-.662l-3.115-3.104c-.185-.185-.429-.277-.672-.277s-.486.092-.672.277l-9.143 9.103c-.569 1.763-1.555 4.823-1.626 5.081-.02.075-.029.15-.029.224 0 .461.349.848.765.848.511 0 .991-.189 5.369-1.681zm-3.27-3.342 2.137 2.137-3.168 1.046zm.955-1.166 7.651-7.616 2.335 2.327-7.637 7.638z" fill-rule="nonzero"/>
</svg></a>';
    echo '<a href="verifDelParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '"><svg clip-rule="evenodd" fill="currentColor" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero"/>
</svg></a></td>';
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
            echo '<td><a href="acceptParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/></svg></a>';
            echo '<a href="refuseParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 16.538l-4.592-4.548 4.546-4.587-1.416-1.403-4.545 4.589-4.588-4.543-1.405 1.405 4.593 4.552-4.547 4.592 1.405 1.405 4.555-4.596 4.591 4.55 1.403-1.416z"/></svg></a></td>';
            echo '</tr>';
        }
    }

?>
</table>

<?php
require('../../composants/footer.php');
?>
