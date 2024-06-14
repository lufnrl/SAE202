<?php
require '../model/connectBD.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Vous devez être connecté";
    header('Location: formConnexion.php');
    exit();
}

$mdp = $_POST['newPassword'];
$confirmMdp = $_POST['confirmNewPassword'];

if ($mdp && $confirmMdp) {
    if ($mdp === $confirmMdp) {
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $query = "UPDATE users SET user_pass = :mdp WHERE user_id = :userId";
        $req = $bd->prepare($query);
        $req->bindParam(':mdp', $mdp);
        $req->bindParam(':userId', $_SESSION['user_id'], PDO::PARAM_INT);
        if ($req->execute()) {
            header('Location: compte.php');
            exit();
        } else {
            echo "Erreur lors de la modification du mot de passe.";
        }
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
} else {
    echo "Tous les champs requis doivent être remplis.";
}
?>