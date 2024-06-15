<?php
session_start();
require '../../model/connectBD.php';

$userId = $_POST['user_id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];

// Vérifiez que l'utilisateur est connecté et que les champs nécessaires sont remplis
if ($userId && !empty($nom) && !empty($prenom) && !empty($email) && !empty($login)) {

    // Utilisation de PDO
    $query = "UPDATE users SET user_nom = :nom, user_prnm = :prenom, user_email = :email, user_login = :login WHERE user_id = :userId";
    $req = $bd->prepare($query);

    // Liaison des paramètres
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':email', $email);
    $req->bindParam(':login', $login);
    $req->bindParam(':userId', $userId, PDO::PARAM_INT);

    if ($req->execute()) {
        // Met à jour les informations de session
        $_SESSION['user_nom'] = $nom;
        $_SESSION['user_prnm'] = $prenom;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_login'] = $login;

        $_SESSION['alert_type'] = "success";
        $_SESSION['alert_message'] = "Profil mis à jour avec succès.";

        // Redirection après une mise à jour réussie
        header('Location: /admin/users/tableUsers.php');
        exit();
    } else {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Erreur lors de la mise à jour du profil.";
    }
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Tous les champs requis doivent être remplis.";
}
?>