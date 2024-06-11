<?php
require('../model/connectBD.php');
require('../composants/head.php');
require('../composants/header.php');
?>

<h1>Récapitulatif de votre réservation</h1>

<?php
if (isset($_GET['users']) && isset($_GET['parcelles'])) {
    $user_id = $_GET['users'];
    $parcelle_id = $_GET['parcelles'];

    // jointure entre parcelle et jardin
    $requete = $bd->prepare('SELECT * FROM parcelles INNER JOIN jardins ON parcelles._jardin_id = jardins.jardin_id WHERE parcelle_id = ?');
    $requete->bindParam(1, $parcelle_id);
    $requete->execute();
    $parcelle = $requete->fetch(PDO::FETCH_ASSOC);

} else {
    echo '<p>Erreur lors de la réservation</p>';
}
?>

<p>à propos de la parcelle</p>
<br>
<ul>
    <li>Nom de la parcelle: <?= $parcelle['parcelle_nom'] ?></li>
    <li>Etat de la parcelle: <?= $parcelle['parcelle_etat'] ?></li>
</ul>
<br>
<p>à propos du jardin</p>
<br>
<ul>
    <li>Nom du jardin: <?= $parcelle['jardin_nom'] ?></li>
    <li>Adresse du jardin: <?= $parcelle['jardin_adr'] ?></li>
    <li>Ville du jardin: <?= $parcelle['jardin_ville'] ?></li>
    <li>Coordonnée Latitude du jardin: <?= $parcelle['jardin_coordLat'] ?> <?= $parcelle['jardin_coordLong'] ?></li>
    <li>Itinéraire Google Maps: <a href="<?= $parcelle['jardin_maps'] ?>">Voir l'itinéraire</a></li>
</ul>

<form action="verifReservation.php" method="post">
    <input type="hidden" name="users" value="<?php echo $user_id ?>">
    <input type="hidden" name="parcelles" value="<?php echo $parcelle_id ?>">

    <!-- choisir une date de départ et d'arrivée -->
    <label for="dateDeb">Date de début</label>
    <input type="date" name="dateDeb" id="dateDeb">
    <label for="dateFin">Date de fin</label>
    <input type="date" name="dateFin" id="dateFin">
    <br>
    <input type="submit" value="Confirmer">
</form>

<a href="/users/compte.php?users=<?php echo $user_id ?>">Retour</a>