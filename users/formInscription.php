<?php
require '../composants/head.php';
require('../composants/header.php');

if (isset($_SESSION['alert_message'])) {
    echo '<div class="alert alert-' . $_SESSION['alert_type'] . ' alert-dismissible fade show" role="alert">
    ' . $_SESSION['alert_message'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['alert_message']);
    unset($_SESSION['alert_type']);
}
?>

<form action="verifInscription.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="username">Username :</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="verif_password">Confirmer le mot de passe :</label>
    <input type="password" id="verif_password" name="verif_password" required>

    <button type="submit">S'inscrire</button>
</form>
