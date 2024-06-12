<?php
require '../model/connectBD.php';
require '../composants/head.php';
require('../composants/header.php');
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
        <label for="parcelle_desc">Description de la parcelle</label>
        <input type="text" name="parcelle_desc" id="parcelle_desc" value="<?php echo $parcelle['parcelle_desc'] ?>">
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
