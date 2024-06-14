<?php
    require('../../model/connectBD.php');
    require('../../composants/head.php');
    require('../../composants/headerAdmin.php');

session_start();

$req = $bd->query("SELECT * FROM users ORDER BY 1");
$users = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Les utilisateurs</h1>

<table border=1>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Nom d'utilisateur</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['user_id'] . '</td>';
        // photo de profil
        echo '<td><img src="/src/assets/uploads/' . $user['user_photo'] . '" alt="Photo de profil" style="width:100px;"></td>';
        echo '<td>' . $user['user_nom'] . '</td>';
        echo '<td>' . $user['user_prnm'] . '</td>';
        echo '<td>' . $user['user_login'] . '</td>';
        echo '<td>' . $user['user_email'] . '</td>';
        echo '
              <td>
                  <a href="compte.php?users=' . $user['user_id'] . '">Voir</a>
                  <a href="modifFormUser.php?users=' . $user['user_id'] . '">Modifier</a>
                  <a href="verifDelUser.php?users=' . $user['user_id'] . '">Supprimer</a>
              </td>
        ';
        echo '</tr>';
    }
    ?>
</table>

<?php
require('../../composants/footer.php');
?>