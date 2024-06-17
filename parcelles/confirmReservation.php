<?php
session_start();
require '../model/connectBD.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: /users/formConnexion.php');
    exit();
}

require '../composants/head.php';
require '../composants/header.php';
?>

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
    $_SESSION['alert_message'] = 'Erreur lors de la réservation';
    $_SESSION['alert_type'] = 'error';
}
?>

<div class="container-reservation">
    <div class="block-info-reservation">
        <div id="title-recap-reservation">
            <h1>Récapitulatif de votre réservation</h1>
        </div>
        <div class="block-recap-infos">
            <div>
                <h2>À propos de la parcelle :</h2>
                <ul>
                    <li>Nom de la parcelle : <?= $parcelle['parcelle_nom'] ?></li>
                    <li>État de la parcelle : <?= $parcelle['parcelle_etat'] ?></li>
                </ul>

                <h2>À propos du jardin :</h2>
                <ul>
                    <li>Nom du jardin : <?= $parcelle['jardin_nom'] ?></li>
                    <li>Adresse du jardin : <?= $parcelle['jardin_adr'] ?></li>
                    <li>Itinéraire Google Maps : <a href="https://maps.app.goo.gl/<?= $parcelle['jardin_maps'] ?>" target="_blank">Voir l'itinéraire</a></li>
                </ul>
            </div>
        </div>

        <form action="verifReservation.php" method="post">
            <input type="hidden" name="users" value="<?php echo $user_id ?>">
            <input type="hidden" name="parcelles" value="<?php echo $parcelle_id ?>">

            <label for="dateDeb">Date de début :</label>
            <input type="date" name="dateDeb" id="dateDeb" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required>

            <label for="dateFin">Date de fin :</label>
            <input type="date" name="dateFin" id="dateFin" min="<?php echo date('Y-m-d'); ?>" required>

            <input type="submit" value="Confirmer">
        </form>

        <a href="/jardins.php">Retour</a>
    </div>
</div>

<?php
require '../composants/footer.php';
?>