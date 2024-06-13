
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
                        echo '<div class="img-profile">';
                        $reqPhoto = "SELECT user_photo FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
                        $resultatPhoto = $bd->query($reqPhoto);
                        $photo = $resultatPhoto->fetch()['user_photo'];
                        echo '<img src="/src/assets/uploads/' . $photo . '" alt="Photo de profil">';
                        echo '</div>';
                        echo'<div class="block-profile">';
                        echo '<div class="title-block-profile">';
                        echo '<span>' . $_SESSION['user_nom'] . ' ' . $_SESSION['user_prnm'] . '</span>';
                        echo '<span>'. $_SESSION['user_email'] .'</span>';
                        echo '</div>';
                        echo '<ul>';
                        echo '<li><a href="/users/compte.php">Mon compte</a></li>';
                        echo '<li><a href="/users/tableReservationUser.php">Mes réservations</a></li>';
                        echo '</ul>';
                        echo '<div class="title-block-profile">';
                        echo '<a id="btn-logout" href="/users/deconnexion.php">Déconnexion</a>';
                        echo '</div>';
                        echo '</div>';

                    }else {
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
                            echo '<div class="img-profile">';
                            $reqPhoto = "SELECT user_photo FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
                            $resultatPhoto = $bd->query($reqPhoto);
                            $photo = $resultatPhoto->fetch()['user_photo'];
                            echo '<img src="/src/assets/uploads/' . $photo . '" alt="Photo de profil">';
                            echo '</div>';

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var imgProfile = document.querySelector('.img-profile');
        var blockProfile = document.querySelector('.block-profile');

        imgProfile.addEventListener('click', function () {
            if (blockProfile.style.display === 'block') {
                blockProfile.style.display = 'none';
            } else {
                blockProfile.style.display = 'block';
            }
        });
    });
</script>