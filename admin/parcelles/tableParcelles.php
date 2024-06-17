<?php
$titre = 'Liste des parcelles';
$desc = 'Page de liste des parcelles admin';
require '../../model/connectBD.php';
require '../../composants/head.php';
require '../../composants/headerAdmin.php';
?>
<div class="container-dashboard">
    <h1>Parcelles</h1>
    <div class="block-tempParcelles">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Contenu</th>
                <th>Etat</th>
                <th>Jardins</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
            $req = $bd->query("SELECT * FROM parcelles");
            $parcelles = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($parcelles as $parcelle) {
                if ($parcelle['parcelle_etat'] === 'ATTENTE') {
                    $etatcss = 'attente';
                } elseif ($parcelle['parcelle_etat'] === 'LIBRE') {
                    $etatcss = 'libre';
                } elseif ($parcelle['parcelle_etat'] === 'RESERVE') {
                    $etatcss = 'reserve';
                }
                echo '<tr>';
                echo '<td>' . $parcelle['parcelle_id'] . '</td>';
                echo '<td>' . $parcelle['parcelle_nom'] . '</td>';
                echo '<td>' . $parcelle['parcelle_content'] . '</td>';
                echo '<td><span class="badge-table '.$etatcss.'">'. $parcelle['parcelle_etat'] .'</span></td>';
                $query = "SELECT * FROM jardins WHERE jardin_id = '" . $parcelle['_jardin_id'] . "'";
                $req = $bd->query($query);
                $jardins = $req->fetchAll();
                echo '<td>'. $jardins[0]['jardin_nom'] . '</td>';
                echo '<td><a href="modifParcelles.php?parcelles=' . $parcelle['parcelle_id'] . '"><svg clip-rule="evenodd" fill="currentColor" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-7.403-3.398 9.124-9.125c.171-.171.279-.423.279-.684 0-.229-.083-.466-.28-.662l-3.115-3.104c-.185-.185-.429-.277-.672-.277s-.486.092-.672.277l-9.143 9.103c-.569 1.763-1.555 4.823-1.626 5.081-.02.075-.029.15-.029.224 0 .461.349.848.765.848.511 0 .991-.189 5.369-1.681zm-3.27-3.342 2.137 2.137-3.168 1.046zm.955-1.166 7.651-7.616 2.335 2.327-7.637 7.638z" fill-rule="nonzero"/>
</svg></a></td>';
                echo '<td><a onclick="openModalParcelle()" href="#" ><svg clip-rule="evenodd" fill="currentColor" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero"/>
</svg></a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <br><br>
    <h2>Parcelles en attente de validation</h2>
    <hr>
    <div class="block-tempParcelles">
        <table>
            <thead>
            <tr>
                <th>Nom de la parcelle</th>
                <th>Etat de la parcelle</th>
                <th>Jardin</th>
                <th>Utilisateur</th>
                <th colspan="2">Actions</th>
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
                    <td><a href="/admin/parcelles/acceptParcelles.php?parcelles=<?= $parcelle['parcelle_id'] ?>">Valider</a></td>
                    <td><a href="/admin/parcelles/refuseParcelles.php?parcelles=<?= $parcelle['parcelle_id'] ?>">Refuser</a></td>
                </tr>
                <?php
            }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal suppression jardin -->
<div class="modal fade" id="modalParcelleDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span onclick="closeModalParcelle()" aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer la parcelle ?
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <a class="profile-action-link" href="#" onclick="closeModalParcelle()" data-dismiss="modal">Annuler</a>
                <a class="profile-action-link" href="verifDelParcelles.php?parcelles=<?=$parcelle['parcelle_id']?>">Oui, supprimer la parcelle</a>
            </div>
        </div>
    </div>
</div>

<script>
    function openModalParcelle() {
        const modal = document.getElementById('modalParcelleDel');
        modal.style.display = 'block';
    }

    function closeModalParcelle() {
        const modal = document.getElementById('modalParcelleDel');
        modal.style.display = 'none';
    }
</script>

<?php
require('../../composants/footer.php');
?>
