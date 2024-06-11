<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';
?>

<h1>Les jardins</h1>

<div>
    <a href="ajoutJardin.php">Ajouter un jardin</a>
</div>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Surface</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Coordonnée Latitude</th>
        <th>Coordonnée Longitude</th>
        <th>Photo</th>
        <th>Maps</th>
        <th>Info Terre</th>
        <th>Nb de parcelles</th>
        <th>Action</th>
    </tr>

<?php
$req = $bd->query("SELECT * FROM jardins");
$jardins = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($jardins as $jardin) {
    echo '<tr>';
    echo '<td>' . $jardin['jardin_id'] . '</td>';
    echo '<td>' . $jardin['jardin_nom'] . '</td>';
    echo '<td>' . $jardin['jardin_surface'] . '</td>';
    echo '<td>' . $jardin['jardin_adr'] . '</td>';
    echo '<td>' . $jardin['jardin_ville'] . '</td>';
    echo '<td>' . $jardin['jardin_coordLat'] . '</td>';
    echo '<td>' . $jardin['jardin_coordLong'] . '</td>';
    echo '<td>' . $jardin['jardin_photo'] . '</td>';
    echo '<td>' . $jardin['jardin_maps'] . '</td>';
    echo '<td>' . $jardin['jardin_infoTerre'] . '</td>';
    // count du nombres de parcelles que contient le jardin
    $stmt_parcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
    $stmt_parcelles->execute([$jardin['jardin_id']]);
    $parcelles = $stmt_parcelles->fetchAll(PDO::FETCH_ASSOC);
    echo '<td>' . count($parcelles) . '</td>';
    echo '<td><a href="jardin.php?jardins=' . $jardin['jardin_id'] . '">Modifier</a>';
    echo '<td><a href="jardin.php?jardins=' . $jardin['jardin_id'] . '">Supprimer</a>';
    echo '</tr>';
}
?>

</table>

