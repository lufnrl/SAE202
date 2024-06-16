<?php
require '../model/connectBD.php';
require '../composants/head.php';
require '../composants/headerAdmin.php';
?>
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
    <h1>Parcelles en attentes</h1>
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

    <style>
        .container-dashboard {
            min-height: 100vh;
            max-width: 1200px;
            width: 100%;
            margin: 100px auto;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 2rem;
            margin-top: 0;
            text-align: left;
        }

        .grid-dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .grid-dashboard a {
            text-decoration: none;
            box-shadow: 0 0 2px rgba(0,0,0,.4);
            color: #000;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            font-family: 'Inter',sans-serif;
            font-size: 20px;
            transition: ease-in-out .2s;
            display: flex;
            flex-direction: column;
            background-color: white;
            height: 100px;
            justify-content: center;
        }

        .grid-dashboard a div {
            margin-bottom: 1rem;
        }

        .grid-dashboard a span {
            font-size: 2rem;
            font-weight: bold;
        }

        .grid-dashboard a p {
            font-size: 1rem;
        }

        .grid-dashboard a:hover {
            background-color: #e5e5e5;
        }

        .block-tempParcelles {
            margin-top: 1rem;
            width: 100%;
            max-width: 1200px;
        }

        .block-tempParcelles table {
            width: 100%;
            border-collapse: collapse;
        }

        .block-tempParcelles table thead {
            background-color: #f5f5f5;
        }

        .block-tempParcelles table th, .block-tempParcelles table td {
            padding: 10px;
            border: 1px solid #e5e5e5;
            text-align: center;
        }

        .badge-table {
        font-family: 'Inter',sans-serif;
        border-collapse: collapse;
        text-align: center;
        padding-top: .125rem;
        padding-bottom: .125rem;
        padding-left: .625rem;
        padding-right: .625rem;
        border-radius: .25rem;
        font-size: 12px;
        line-height: 1rem;
        font-weight: 500;
        }

        .attente {
            color: #92400E;
            background-color: #FEF3C7;
        }

        .libre {
            color: #0F5132;
            background-color: #D1E7DD;
        }

        .reserve {
            color: #C53030;
            background-color: #FED7D7;
        }
    </style>



<?php
require('../composants/footer.php');
?>