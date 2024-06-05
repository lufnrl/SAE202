<?php
include '/var/www/sae202/conf/conf.inc.php';
try {
    $bd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>