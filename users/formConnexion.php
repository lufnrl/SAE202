<section >
    <?php
    session_start();

    echo $_SESSION['alert_message'];
    ?>
    <div>
        <div>
            <div>
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
                    <div>
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                    <button type="submit">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</section>