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

    // Vérifiez si le nom d'utilisateur ou l'e-mail existe déjà
    $check_query = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $bd->prepare($check_query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($password !== $verif_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    if ($result->num_rows > 0) {
        echo "L'e-mail est déjà pris.";
    } else {

        // Insérez le nouvel utilisateur dans la base de données
        $insert_query = "INSERT INTO users (user_nom, user_prnm, user_login, user_pass, user_email, user_photo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $bd->prepare($insert_query);
        $stmt->bind_param('ssssss', $nom, $prenom, $username, $password, $email, $photo);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Inscription réussie, créez une session et redirigez
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['email'] = $email;
            header('Location: ../../index.php');
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
} else {
    echo "Requête invalide.";
}
?>
