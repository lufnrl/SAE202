<?php
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';
?>

<h1>Les jardins</h1>

<div>
    <a href="ajoutJardin.php">Ajouter un jardin</a>
</div>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Nom</th>
        <th>Surface</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Coordonnée Latitude</th>
        <th>Coordonnée Longitude</th>
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
    echo '<td><img src="/src/assets/uploads/' . $jardin['jardin_photo'] . '" alt="Photo de jardin" style="width:100px;"></td>';
    echo '<td>' . $jardin['jardin_nom'] . '</td>';
    echo '<td>' . $jardin['jardin_surface'] . '</td>';
    echo '<td>' . $jardin['jardin_adr'] . '</td>';
    echo '<td>' . $jardin['jardin_ville'] . '</td>';
    echo '<td>' . $jardin['jardin_coordLat'] . '</td>';
    echo '<td>' . $jardin['jardin_coordLong'] . '</td>';
    // lien google maps
    echo '<td><a href="' . $jardin['jardin_maps'] . '">Lien Google Maps</a></td>';
    echo '<td>' . $jardin['jardin_infoTerre'] . '</td>';
    // count du nombres de parcelles que contient le jardin
    $stmt_parcelles = $bd->prepare("SELECT * FROM parcelles WHERE _jardin_id = ?");
    $stmt_parcelles->execute([$jardin['jardin_id']]);
    $parcelles = $stmt_parcelles->fetchAll(PDO::FETCH_ASSOC);
    echo '<td>' . count($parcelles) . '</td>';
    echo '<td><a href="modifJardins.php?jardins=' . $jardin['jardin_id'] . '"><svg style="width: 25px;" clip-rule="evenodd" fill="currentColor" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-7.403-3.398 9.124-9.125c.171-.171.279-.423.279-.684 0-.229-.083-.466-.28-.662l-3.115-3.104c-.185-.185-.429-.277-.672-.277s-.486.092-.672.277l-9.143 9.103c-.569 1.763-1.555 4.823-1.626 5.081-.02.075-.029.15-.029.224 0 .461.349.848.765.848.511 0 .991-.189 5.369-1.681zm-3.27-3.342 2.137 2.137-3.168 1.046zm.955-1.166 7.651-7.616 2.335 2.327-7.637 7.638z" fill-rule="nonzero"/></svg></a>';
    echo '<td><a href="verifDelJardins.php?jardins=' . $jardin['jardin_id'] . '"><svg style="width: 20px;" clip-rule="evenodd" fill="currentColor" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero"/></svg></a>';
    echo '</tr>';
}
?>

</table>

<?php
require('../../composants/footer.php');
?>