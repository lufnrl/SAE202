<nav class="navbar">
        <h1><a href="./index.php" title="ACCUEIL">POTAGERS PARTAGES</a></h1>
        <ul id="lien-pages">
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="current"' : ''; ?>><a href="./index.php">Accueil</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'jardins.php') ? 'class="current"' : ''; ?>><a href="./jardins.php">Jardins</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="current"' : ''; ?>><a href="./contact.php">Contact</a></li>
        </ul>
        <ul id="lien-inscription">
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'inscription.php') ? 'class="current"' : ''; ?>><a href="./inscription">Inscriptions</a></li>
            <li>|</li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'connexion.php') ? 'class="current"' : ''; ?>><a href="./connexion"> Connexion</a></li>
        </ul>
    </nav>