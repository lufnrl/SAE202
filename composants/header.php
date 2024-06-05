<nav class="navbar">
    <h1><a href="/index.php" title="ACCUEIL">POTAGERS PARTAGES</a></h1>
    <ul id="lien-pages">
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="current"' : ''; ?>><a href="/index.php">Accueil</a></li>
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'jardins.php') ? 'class="current"' : ''; ?>><a href="/jardins.php">Jardins</a></li>
        <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="current"' : ''; ?>><a href="/contact.php">Contact</a></li>
    </ul>
    <ul id="lien-inscription">
    <?php
        session_start();

        if (isset($_SESSION['user_id'])) {
            echo $_SESSION['user_nom'];
            echo $_SESSION['user_prnm'];
            echo '<a href="/users/deconnexion.php">Déconnexion</a>';
            echo '<a href="/users/compte.php">Mon compte</a>';

        } else {

            echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formConnexion.php' ? ' class="current"' : '') . '><a href="/users/formConnexion.php">Connexion</a></li>';
            echo '<li>|</li>';
            echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formInscription.php' ? ' class="current"' : '') . '><a href="/users/formInscription.php">Inscription</a></li>';

            // echo '<a href="/users/formConnexion.php">Connexion</a>';
            // echo '<a href="/users/formInscription.php">Inscription</a>';
        }
        ?>
    </ul>
</nav>