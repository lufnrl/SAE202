<?php
session_start(); // Démarrer la session

require_once('../model/connectBD.php'); // Inclure le fichier de connexion à la base de données

$username = $_POST['username'];
$password = $_POST['password'];

//la requête
$req = $bd->query("SELECT * FROM users WHERE user_login = '$username'");
//on récupère le résultat
$resultat = $req->fetch();

if ($resultat) {
    // Vérifier le mot de passe
    if (password_verify($password, $resultat['user_pass'])) {
        // Connexion réussie
        $_SESSION['user_id'] = $resultat['user_id'];
        $_SESSION['user_email'] = $resultat['user_email'];
        $_SESSION['user_nom'] = $resultat['user_nom'];
        $_SESSION['user_prnm'] = $resultat['user_prnm'];
        $_SESSION['user_login'] = $resultat['user_login'];
        $_SESSION['user_photo'] = $resultat['user_photo'];
        $_SESSION['alert_type'] = "success";
        $_SESSION['alert_message'] = "Vous êtes connecté.";
        header('Location: ../../index.php'); // Redirigez vers la page de tableau de bord ou d'accueil
        //echo "Connexion réussie.";
        exit();
    } else {
        //echo "Mot de passe incorrect.";
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Mot de passe incorrect.";
        header('Location: formConnexion.php');
    }
} else {
    //echo "Nom d'utilisateur incorrect.";
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Nom d'utilisateur incorrect.";
    header('Location: formConnexion.php');
}

?>