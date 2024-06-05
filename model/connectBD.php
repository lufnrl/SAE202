<?php
include '/var/www/sae202/conf/conf.inc.php';
$bd = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($bd->connect_error) {
    die("Connection failed: " . $bd->connect_error);
} else {
    //echo "Connected successfully";
}
?>