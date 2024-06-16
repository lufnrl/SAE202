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

<style>
    .container {
        max-width: 800px;
        margin: 100px auto;
        min-height: 50vh;
    }

    .block-info-reservation {
        background-color: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    p {
        margin-bottom: 20px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #666;
    }

    input[type="date"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #5E7B51;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #5E7B51;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #333;
        text-decoration: none;
    }

    #title-recap-reservation h1 {
        margin-top: 50px;
        margin-bottom: 20px;
        text-align: left;
    }

    #title-recap-reservation {
        max-width: 600px;
        margin: 0 auto;
    }

    h2 {
        margin-top: 20px;
        margin-bottom: 10px;
        font-size: 20px;
    }

    .block-recap-infos {
        max-width: 600px;
        margin: 50px auto;
        background-color: #f9f9f9;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    .block-recap-infos div {
        padding: 0 20px;
    }


    input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }

</style>

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

<div class="container">
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
                    <li>Itinéraire Google Maps : <a href="<?= $parcelle['jardin_maps'] ?>" target="_blank">Voir l'itinéraire</a></li>
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

        <a href="/users/compte.php?users=<?php echo $user_id ?>">Retour</a>
    </div>
</div>

<?php
require '../composants/footer.php';
?>