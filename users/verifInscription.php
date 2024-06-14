<?php
session_start();
require_once('../model/connectBD.php');

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: formConnexion.php');
    exit();
}

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
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Les mots de passe ne correspondent pas.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Vérifiez si l'e-mail existe déjà
    $stmt = $bd->prepare("SELECT * FROM users WHERE user_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "L'e-mail est déjà pris.";
    } else {

        // Insérez le nouvel utilisateur dans la base de données
        $stmt = $bd->prepare("INSERT INTO users (user_nom, user_prnm, user_login, user_pass, user_email, user_photo) VALUES (:nom, :prenom, :username, :password, :email, :photo)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':photo', $photo);

        if ($stmt->execute()) {
            $_SESSION['alert_type'] = "success";
            $_SESSION['alert_message'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            header('Location: formConnexion.php');
            exit();
        } else {
            $_SESSION['alert_type'] = "error";
            $_SESSION['alert_message'] = "Erreur lors de l'inscription.";
        }
    }
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Requête invalide.";
}
?>
