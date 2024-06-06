<?php
session_start(); // Démarrer la session

require_once('../model/connectBD.php'); // Inclure le fichier de connexion à la base de données


// si l'utilisateur est connecté, on le redirige vers la page d'accueil
if (isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit();
} else {
    //echo "Vous n'êtes pas connecté.";
    header('Location: formConnexion.php');
}

$username = $_POST['username'];
$password = $_POST['password'];

//la requête
$req = $bd->query("SELECT * FROM users WHERE user_login = '$username'");
//on récupère le résultat
$resultat = $req->fetch();

if ($resultat) {
    // Vérifier le mot de passe
    if ($password == $resultat['user_pass']) {
        // Connexion réussie
        $_SESSION['user_id'] = $resultat['user_id'];
        $_SESSION['user_email'] = $resultat['user_email'];
        $_SESSION['user_nom'] = $resultat['user_nom'];
        $_SESSION['user_prnm'] = $resultat['user_prnm'];
        $_SESSION['user_login'] = $resultat['user_login'];
        header('Location: ../../index.php'); // Redirigez vers la page de tableau de bord ou d'accueil
        //echo "Connexion réussie.";
        exit();
    } else {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Mot de passe incorrect.";
        header('Location: formConnexion.php');
        //echo "Mot de passe incorrect.";
    }
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Nom d'utilisateur incorrect.";
    header('Location: formConnexion.php');
    //echo "Nom d'utilisateur incorrect.";
}

?>
