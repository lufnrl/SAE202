<?php
$titre = 'S\'inscrire';
$desc = 'Page d\'inscription à votre compte utilisateur';
require '../composants/head.php';
require('../composants/header.php');
?>

<section class="connexion-inscription">

<div class="inscription-image"></div>

<div class="connexion-inscription-content">
<h1>Inscription</h1>
<form action="verifInscription.php" method="post">
    <div>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Doe" required>
    </div>

    <div>
        <label for="prenom">Prenom</label>
        <input type="text" id="prenom" name="prenom" placeholder="John" required>
    </div>

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="johndoe" required>
    </div>

    <div>
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" placeholder="john.doe@mail.com" required>
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>
    </div>

    <div>
        <label for="verif_password">Confirmer le mot de passe</label>
        <input type="password" id="verif_password" name="verif_password" placeholder="••••••••" required>
    </div>

    <button type="submit">S'inscrire</button>

    
</form>

<p class="lien-connexion-inscription">Déjà inscrit ? <a href=formConnexion.php>Connectez-vous !</a></p>

</div>
</section>

<?php require("../composants/footer.php") ?>
