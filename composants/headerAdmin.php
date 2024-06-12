
<header id="main-header">
    <div id="items-header">
        <a href="/index.php" title="ACCUEIL"><img src="../src/assets/img/logo.webp" alt="Logo"></a>
        <div id="links-header">
            <nav>
                <ul>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'class="current"' : ''; ?>><a href="/admin/dashboard.php">Dashboard</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableParcelles.php') ? 'class="current"' : ''; ?>><a href="/admin/parcelles/tableParcelles.php">Les parcelles</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableJardins.php') ? 'class="current"' : ''; ?>><a href="/admin/jardins/tableJardins.php">Les jardins</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableUsers.php') ? 'class="current"' : ''; ?>><a href="/admin/users/tableUsers.php">Les utilisateurs</a></li>
                </ul>
            </nav>
        </div>
        <div id="links-header-mobile">
            <a href="#" id="mobile-menu-btn"><i class="fas fa-bars"></i></a>
            <nav id="mobile-menu">
                <ul>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'class="current"' : ''; ?>><a href="../admin/dashboard.php">Dashboard</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableParcelles.php') ? 'class="current"' : ''; ?>><a href="../admin/parcelles/tableParcelles.php">Les parcelles</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableJardins.php') ? 'class="current"' : ''; ?>><a href="/admin/jardins/tableJardins.php">Les jardins</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableUsers.php') ? 'class="current"' : ''; ?>><a href="/admin/users/tableUsers.php">Les utilisateurs</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var mobileMenuBtn = document.getElementById('mobile-menu-btn');
        var mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function () {
            if (mobileMenu.style.display === 'block') {
                mobileMenu.style.display = 'none';
            } else {
                mobileMenu.style.display = 'block';
            }
        });
    });
</script>