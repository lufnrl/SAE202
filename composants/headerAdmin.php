<?php
session_start();
?>
<header id="main-header">
    <div id="items-header">
        <a href="/index.php" title="ACCUEIL"><img src="/src/assets/img/logo.webp" alt="Logo"></a>
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
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'class="current"' : ''; ?>><a href="/admin/dashboard.php">Dashboard</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableParcelles.php') ? 'class="current"' : ''; ?>><a href="/admin/parcelles/tableParcelles.php">Les parcelles</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableJardins.php') ? 'class="current"' : ''; ?>><a href="/admin/jardins/tableJardins.php">Les jardins</a></li>
                    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'tableUsers.php') ? 'class="current"' : ''; ?>><a href="/admin/users/tableUsers.php">Les utilisateurs</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<?php
if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
    echo '<label>
                <input type="checkbox" class="alertCheckbox" autocomplete="off" />
                <div class="alert '.$_SESSION['alert_type'].'">
                    <span class="alertClose">X</span>
                    <span class="alertText">'.$_SESSION['alert_message'].'</span>
                </div>
            </label>'."\n";
    unset($_SESSION['alert_type']);
    unset($_SESSION['alert_message']);
}
?>

<style>
    /**** ALERT ****/

    .alert {
        padding: 10px;
        line-height: 1.8;
        border-radius: 5px;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        position: fixed;
        right: 0;
        bottom: 0;
        margin-bottom: 20px;
        margin-right: 20px;
        z-index: 9999;
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 200px;
        width: 100%;
        flex-direction: row-reverse;

    }

    .alertCheckbox {
        display: none;
    }

    :checked + .alert {
        display: none;
    }

    .alertText {
        display: table;
        margin: 0 auto;
        text-align: center;
        font-size: 13px;

    }

    .alertClose {
        float: right;
        font-size: 10px;
    }

    .clear {
        clear: both;
    }
    .warning {
        background-color: #FDF7DF;
        border: 1px solid #FEEC6F;
        color: #C9971C;
    }

    .error {
        background-color: #FDECEA;
        border: 1px solid #FBC2C4;
        color: #D64550;
    }

    .success {
        background-color: #E9F7EF;
        border: 1px solid #A3E9A4;
        color: #2E854B;
    }

    /**** ALERT ****/
</style>

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