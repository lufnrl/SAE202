<?php
require '../../model/connectBD.php';

session_start();

$req = $bd->query("SELECT * FROM users");
$users = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Login</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['user_id'] . '</td>';
        echo '<td>' . $user['user_nom'] . '</td>';
        echo '<td>' . $user['user_prnm'] . '</td>';
        echo '<td>' . $user['user_login'] . '</td>';
        echo '<td>' . $user['user_email'] . '</td>';
        echo '<td>' . $user['user_photo'] . '</td>';
        echo '<td><a href="compte.php?users=' . $user['user_id'] . '">Voir</a><a href="compte.php?users=' . $user['user_id'] . '">Modifier</a><a href="compte.php?users=' . $user['user_id'] . '">Supprimer</a></td>';
        echo '</tr>';
    }
    ?>
</table>
