<nav class="navbar">
    <a href="/index.php" title="ACCUEIL"><img src="../src/assets/img/logo.webp"></a>
    <div id="menu-items">
        <ul id="lien-pages">
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="current"' : ''; ?>><a href="/index.php">Accueil</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'jardins.php') ? 'class="current"' : ''; ?>><a href="/jardins.php">Jardins</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="current"' : ''; ?>><a href="/contact.php">Contact</a></li>
        </ul>
        <ul id="lien-inscription">
            <?php
            session_start();

            if (isset($_SESSION['user_id'])) {
                echo '<li>';
                echo '<a href="/users/compte.php">';

                if (empty($_SESSION['user_photo'])) {
                    echo '<img src="https://www.gravatar.com/avatar/' . md5(strtolower(trim($_SESSION['user_email']))) . '?s=48&d=identicon" alt="Photo de profil">';
                } else {
                    echo '<img src="/src/assets/img/' . $_SESSION['user_photo'] . '" alt="Photo de profil">';
                }
                echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_prnm'];
                echo '</a>';
                echo '</li>';
                echo '<li><a href="/users/deconnexion.php">Déconnexion</a></li>';
            } else {
                echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formConnexion.php' ? ' class="current"' : '') . '><a href="/users/formConnexion.php">Connexion</a></li>';
                echo '<li>|</li>';
                echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formInscription.php' ? ' class="current"' : '') . '><a href="/users/formInscription.php">Inscription</a></li>';
            }
            ?>
        </ul>
    </div>
    <button class="burger-menu">&#9776;</button>
</nav>