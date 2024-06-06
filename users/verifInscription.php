<?php
session_start();
require_once('../model/connectBD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verif_password = $_POST['verif_password'];
    $photo = $_POST['photo'];

    // Vérifiez que les mots de passe correspondent
    if ($password !== $verif_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Vérifiez si l'e-mail existe déjà
    $stmt = $bd->prepare("SELECT * FROM users WHERE user_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "L'e-mail est déjà pris.";
    } else {

        // Insérez le nouvel utilisateur dans la base de données
        $stmt = $bd->prepare("INSERT INTO users (user_nom, user_prnm, user_login, user_pass, user_email, user_photo) VALUES (:nom, :prenom, :username, :password, :email, :photo)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':photo', $photo);

        if ($stmt->execute()) {
            header('Location: formConnexion.php');
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
} else {
    echo "Requête invalide.";
}
?>
