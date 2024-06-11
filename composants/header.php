
<header id="main-header">
    <div id="items-header">
        <a href="/index.php" title="ACCUEIL"><img src="../src/assets/img/logo.webp" alt="Logo"></a>
        <div id="links-header">
            <nav>
                <ul>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="current"' : ''; ?>><a href="/index.php">Accueil</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'jardins.php') ? 'class="current"' : ''; ?>><a href="/jardins.php">Jardins</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="current"' : ''; ?>><a href="/contact.php">Contact</a></li>
                </ul>

                <ul>
                    <?php
                        session_start();
                        if (isset($_SESSION['user_id'])) {
                            echo '<li>';
                            echo '<a href="/users/compte.php">';
                        if (empty($_SESSION['user_photo'])) {
                            echo '<img src="https://www.gravatar.com/avatar/' . md5(strtolower(trim($_SESSION['user_email']))).'?s=48&d=identicon" alt="Photo de profil">';
                        } else {
                            echo '<img src="/src/assets/img/' . $_SESSION['user_photo'] . '" alt="Photo de profil">';
                        }
                        
                        echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_prnm'];
                        echo '</a>';
                        echo '</li>';
                        echo '<li><a href="/users/deconnexion.php">Déconnexion</a></li>';
                
                        } else {
                            echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formConnexion.php' ? ' class="current"' : '') . '><a href="/users/formConnexion.php">Connexion</a></li>';
                            echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formInscription.php' ? ' class="current"' : '') . ' id="link-inscription"><a href="/users/formInscription.php">Inscription</a></li>';
                        }
                    ?>
                
                </ul>
            </nav>
        </div>
        <div id="links-header-mobile">
            <a href="#" id="mobile-menu-btn"><i class="fas fa-bars"></i></a>
            <nav id="mobile-menu">
                <ul>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="current"' : ''; ?>><a href="/index.php">Accueil</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'jardins.php') ? 'class="current"' : ''; ?>><a href="/jardins.php">Jardins</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="current"' : ''; ?>><a href="/contact.php">Contact</a></li>
                    
                    <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<li>';
                            echo '<a href="/users/compte.php">';
                        if (empty($_SESSION['user_photo'])) {
                            echo '<img src="https://www.gravatar.com/avatar/' . md5(strtolower(trim($_SESSION['user_email']))).'?s=48&d=identicon" alt="Photo de profil">';
                        } else {
                            echo '<img src="/src/assets/img/' . $_SESSION['user_photo'] . '" alt="Photo de profil">';
                        }
                        
                        echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_prnm'];
                        echo '</a>';
                        echo '</li>';
                        echo '<li><a href="/users/deconnexion.php">Déconnexion</a></li>';
                
                        } else {
                            echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formConnexion.php' ? ' class="current"' : '') . '><a href="/users/formConnexion.php">Connexion</a></li>';
                            echo '<li' . (basename($_SERVER['PHP_SELF']) == 'formInscription.php' ? ' class="current"' : '') . '><a href="/users/formInscription.php">Inscription</a></li>';
                        }
                    ?>
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