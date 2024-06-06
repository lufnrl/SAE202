<?php
session_start();

echo $_SESSION['alert_message'];
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

    <label for="photo">Photo :</label>
    <input type="text" id="photo" name="photo" required>

    <button type="submit">S'inscrire</button>
</form>
