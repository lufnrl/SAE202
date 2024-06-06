<section >
    <?php
    require '../composants/head.php';
    require('../composants/header.php');
    ?>
    <div>
        <div>
            <div>
                <br>
                <br>
                <br>
                <h1>
                    Se connecter à votre compte
                </h1>
                <form action="verifConnexion.php" method="post">
                    <div>
                        <label for="username" >Votre nom d'utilisateur</label>
                        <input type="text" name="username" id="username" placeholder="John" required>
                    </div>
                    <div>
                        <label for="password">Votre mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</section