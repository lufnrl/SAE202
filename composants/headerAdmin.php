<nav class="navbar">
    <h1><a href="/index.php" title="ACCUEIL">Admin Jard'Unis</a></h1>
    <div id="menu-items">
        <ul id="lien-pages">
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="current"' : ''; ?>><a href="/admin/jardins/tableJardins.php">Les jardins</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'jardins.php') ? 'class="current"' : ''; ?>><a href="/admin/parcelles/tableParcelles.php">Les parcelles</a></li>
            <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="current"' : ''; ?>><a href="/admin/users/tableUsers.php">Les utilisateurs</a></li>
        </ul>
    </div>
    <button class="burger-menu">&#9776;</button>
</nav>