<?php
$titre = 'Modifier une parcelle';
$desc = 'Page de modification d\'une parcelle utilisateur';
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

<h1>
    Modifier une parcelle
</h1>

<?php
$parcelle_id = $_GET['parcelles'];

$query = "SELECT * FROM parcelles WHERE parcelle_id = '" . $parcelle_id . "'";
$req = $bd->query($query);
$parcelle = $req->fetch();
?>

<form action="verifModifParcelleUser.php" method="post">
    <div>
        <input type="hidden" name="parcelle_id" value="<?php echo $parcelle['parcelle_id'] ?>">
    </div>
    <div>
        <label for="parcelle_nom">Nom de la parcelle</label>
        <input type="text" name="parcelle_nom" id="parcelle_nom" value="<?php echo $parcelle['parcelle_nom'] ?>">
    </div>
    <div>
        <label for="parcelle_content">Contenu de la parcelle</label>
        <input type="text" name="parcelle_content" id="parcelle_content" value="<?php echo $parcelle['parcelle_content'] ?>">
    </div>
    <div>
        <label for="parcelle_etat">Etat de la parcelle</label>
        <input type="text" name="parcelle_etat" id="parcelle_etat" value="<?php echo $parcelle['parcelle_etat'] ?>">
    </div>
    <div>
        <label for="_jardin_id">Jardin de la parcelle</label>
        <select name="_jardin_id" id="_jardin_id">
            <?php
            $query = "SELECT * FROM jardins WHERE jardin_id = '" . $parcelle['_jardin_id'] . "'";
            $req = $bd->query($query);
            $jardins = $req->fetchAll();
            foreach ($jardins as $jardin) {
                echo '<option value="' . $jardin['jardin_id'] . '">' . $jardin['jardin_nom'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Modifier">
    </div>
</form>
