<?php
require '../composants/head.php';
require('../composants/header.php');
?>

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

                    <?php
                    if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
                        ?>
                        <div>
                            <p>
                                <?php
                                    echo $_SESSION['alert_message'];
                                    session_unset();
                                ?>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                </form>
            </div>
            
            <div class="inscription-image"></div>
</section

<?php require("../composants/footer.php") ?>