<nav class="navbar">
    <h1><a href="/index.php" title="ACCUEIL">POTAGERS PARTAGES</a></h1>
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
                // Afficher le nom de l'utilisateur avec minidenticon
                echo '<li>';
                echo '<a href="/users/compte.php">';
                echo '<minidenticon-svg username="' . htmlspecialchars($_SESSION['user_login']) . '"></minidenticon-svg>';
                echo htmlspecialchars($_SESSION['user_nom']) . ' ' . htmlspecialchars($_SESSION['user_prnm']);
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

<style>
    minidenticon-svg svg {
        border-radius: 50%;
        background-color: whitesmoke;
        height: 48px;
        width: 48px;
    };
</style>