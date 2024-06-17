<?php
$titre = 'Se connecter';
$desc = 'Page de connexion à votre compte utilisateur';
require '../composants/head.php';
require('../composants/header.php');
?>

<div class="container">

<section class="connexion-inscription">
    <div class="connexion-inscription-content">
                <h1>
                    Connexion
                </h1>
                <form action="verifConnexion.php" method="post">
                    <div>
                        <label for="username" >Votre nom d'utilisateur</label>
                        <input type="text" name="username" id="username" placeholder="johndoe" required>
                    </div>
                    <div>
                        <label for="password">Votre mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit">Connexion</button>

                    <p class="lien-connexion-inscription">Vous n'êtes pas inscrit ? <a href=formInscription.php>Inscrivez-vous !</a></p>
                </form>
            </div>
            
            <div class="inscription-image"></div>
</section>

</div>

<?php require("../composants/footer.php") ?>