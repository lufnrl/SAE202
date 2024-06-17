<?php
$titre = 'Tableau de bord admin';
$desc = 'Tableau de bord de l\'administrateur';
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/headerAdmin.php';
?>

<main>

<div class="container-dashboard">
    <h1>Tableau de bord</h1>
    <div class="grid-dashboard">
        <a>
            <div>
                <p>Parcelles disponibles</p>
            </div>
            <div>
                <span>
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM parcelles WHERE parcelle_etat = 'LIBRE'");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                    /
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM parcelles");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                </span>
            </div>
        </a>
        <a>
            <div>
                <p>Parcelles en attentes de validation</p>
            </div>
            <div>
                <span>
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM parcelles WHERE parcelle_etat = 'ATTENTE'");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                    /
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM parcelles");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                </span>
            </div>
        </a>
        <a>
            <div>
                <p>Parcelles réservés</p>
            </div>
            <div>
                <span>
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM parcelles WHERE parcelle_etat = 'RESERVE'");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                    /
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM parcelles");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                </span>
            </div>
        </a>
        <a>
            <div>
                <p>Nombres d'utilisateurs</p>
            </div>
            <div>
                <span>
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM users");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                </span>
            </div>
        </a>
        <a>
            <div>
                <p>Nombres de jardins</p>
            </div>
            <div>
                <span>
                    <?php
                    $req = $bd->query("SELECT COUNT(*) FROM jardins");
                    $jardins = $req->fetch(PDO::FETCH_ASSOC);
                    echo $jardins['COUNT(*)'];
                    ?>
                </span>
            </div>
        </a>
    </div>
    <br>
    <h2>Parcelles en attentes</h2>
    <hr>
    <div class="block-tempParcelles">
        <table>
            <thead>
                <tr>
                    <th>Nom de la parcelle</th>
                    <th>Etat de la parcelle</th>
                    <th>Jardin</th>
                    <th>Utilisateur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $req = $bd->query("SELECT * FROM parcelles WHERE parcelle_etat = 'ATTENTE'");
                $parcelles = $req->fetchAll(PDO::FETCH_ASSOC);
                if (empty($parcelles)) {
                    echo '<tr><td colspan="5">Aucune parcelle en attente</td></tr>';
                } else {
                    foreach ($parcelles as $parcelle) {
                        $reqJardin = $bd->prepare("SELECT * FROM jardins WHERE jardin_id = ?");
                        $reqJardin->execute([$parcelle['_jardin_id']]);
                        $jardin = $reqJardin->fetch(PDO::FETCH_ASSOC);

                        $reqUser = $bd->prepare("SELECT * FROM users WHERE user_id = ?");
                        $reqUser->execute([$parcelle['_user_id']]);
                        $user = $reqUser->fetch(PDO::FETCH_ASSOC);

                        if ($parcelle['parcelle_etat'] === 'ATTENTE') {
                            $etatcss = 'attente';
                        } elseif ($parcelle['parcelle_etat'] === 'LIBRE') {
                            $etatcss = 'libre';
                        } elseif ($parcelle['parcelle_etat'] === 'RESERVE') {
                            $etatcss = 'reserve';
                        }
                ?>
                    <tr>
                        <td><?= $parcelle['parcelle_nom'] ?></td>
                        <td>
                            <span class="badge-table <?= $etatcss?>"><?= $parcelle['parcelle_etat'] ?></span>
                        </td>
                        <td><?= $jardin['jardin_nom'] ?></td>
                        <td><?= $user['user_nom'] . ' ' . $user['user_prnm'] ?></td>
                        <td>
                            <a href="/admin/parcelles/acceptParcelles.php?parcelles=<?= $parcelle['parcelle_id'] ?>">Valider</a>
                            <a href="/admin/parcelles/refuseParcelles.php?parcelles=<?= $parcelle['parcelle_id'] ?>">Refuser</a>
                        </td>
                    </tr>
                <?php
                }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</main>

<?php
require('../composants/footer.php');
?>