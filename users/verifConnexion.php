<?php
session_start(); // Démarrer la session

require_once('../model/connectBD.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Rechercher l'utilisateur par nom d'utilisateur
    $query = "SELECT * FROM users WHERE user_login = ?";
    $stmt = $bd->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Vérifier le mot de passe
        if ($password == $user['user_pass']) {
            // Connexion réussie
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_nom'] = $user['user_nom'];
            $_SESSION['user_prnm'] = $user['user_prnm'];
            $_SESSION['user_login'] = $user['user_login'];
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
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Méthode de requête non autorisée.";
    header('Location: formConnexion.php');
    //echo "Méthode de requête non autorisée.";
}
?>
