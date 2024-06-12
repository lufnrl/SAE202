<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/header.php';
?>

<h1>
    Ajouter une parcelle
</h1>

<form action="ajoutParcelleUser.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="parcelle_nom">Nom de la parcelle</label>
        <input type="text" name="parcelle_nom" id="parcelle_nom">
    </div>
    <div>
        <label for="parcelle_content">Contenu de la parcelle</label>
        <input type="text" name="parcelle_content" id="parcelle_content">
    </div>
    <div>
        <label for="parcelle_etat">Etat de la parcelle</label>
        <select name="parcelle_etat" id="parcelle_etat">
            <option value="LIBRE" selected>Libre</option>
        </select>
    </div>
    <div>
        <label for="parcelle_desc">Description de la parcelle</label>
        <textarea name="parcelle_desc" id="parcelle_desc"></textarea>
    </div>
    <div>
        <label for="_jardin_id">Le jardin</label>
        <select name="_jardin_id" id="_jardin_id">
            <?php
            $query = "SELECT * FROM jardins WHERE _user_id = '" . $_SESSION['user_id'] . "'";
            $req = $bd->query($query);
            while ($jardin = $req->fetch()) {
                echo '<option value="' . $jardin['jardin_id'] . '">' . $jardin['jardin_nom'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <label for="_user_id">Le propriétaire</label>
        <select name="_user_id" id="_user_id">
            <?php
            $query = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
            $req = $bd->query($query);
            while ($user = $req->fetch()) {
                echo '<option value="' . $user['user_id'] . '">' . $user['user_nom'] . ' ' . $user['user_prnm'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Ajouter">
    </div>
</form>
