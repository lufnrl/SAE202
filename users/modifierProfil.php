<?php
require '../../model/connectBD.php';
session_start();
?>
<div>
    Mon profil
</div>
<div>
    <div>
        <p>Photo de profil</p>
    </div>
    <div>
        <span><?php echo $_SESSION['user_nom'] ?></span>
        <span><?php echo $_SESSION['user_prnm'] ?></span>
        <span><?php echo $_SESSION['user_login'] ?></span>
    </div>
    <div>
        <p><?php echo $_SESSION['user_email'] ?></p>
    </div>
    <div>
    </div>
    <div>
        <a href="#">Modifier mon profil</a>
        <a href="">supprimer mon compte</a>
    </div>
</div>