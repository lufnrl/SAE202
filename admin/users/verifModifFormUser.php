<?php
session_start();
require '../../model/connectBD.php';

$userId = $_POST['user_id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];
$photo = $_FILES['photo']['name'];

$nouvelleImage = null;

// Vérifiez que l'utilisateur est connecté et que les champs nécessaires sont remplis
if ($userId && !empty($nom) && !empty($prenom) && !empty($email) && !empty($login)) {

    if (!empty($photo)) {
        // vérification du format de l'image téléchargée
        $imageType = $_FILES["photo"]["type"];
        if (($imageType != "image/png") &&
            ($imageType != "image/jpg") &&
            ($imageType != "image/jpeg") &&
            ($imageType != "image/webp")) {
            $_SESSION['alert_type'] = "error";
            $_SESSION['alert_message'] = "Désolé, le type d'image n'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.";
            header('Location: /admin/users/tableUsers.php');
            exit();
        }

        // création d'un nouveau nom pour cette image téléchargée
        $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

        // dépôt du fichier téléchargé dans le dossier /var/www/sae202/src/assets/uploads
        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "../../src/assets/uploads/" . $nouvelleImage)) {
                $_SESSION['alert_type'] = "error";
                $_SESSION['alert_message'] = "Problème avec la sauvegarde de l'image, désolé...";
                header('Location: /admin/users/tableUsers.php');
                exit();
            }
        } else {
            $_SESSION['alert_type'] = "error";
            $_SESSION['alert_message'] = "Problème : image non chargée...";
            header('Location: /admin/users/tableUsers.php');
            exit();
        }
    }

    // Construction dynamique de la requête SQL
    $query = "UPDATE users SET user_nom = :nom, user_prnm = :prenom, user_email = :email, user_login = :login";
    if ($nouvelleImage !== null) {
        $query .= ", user_photo = :photo";
    }
    $query .= " WHERE user_id = :userId";

    $req = $bd->prepare($query);

    // Liaison des paramètres
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':email', $email);
    $req->bindParam(':login', $login);
    if ($nouvelleImage !== null) {
        $req->bindParam(':photo', $nouvelleImage);
    }
    $req->bindParam(':userId', $userId, PDO::PARAM_INT);

    if ($req->execute()) {
        // Met à jour les informations de session
        $_SESSION['user_nom'] = $nom;
        $_SESSION['user_prnm'] = $prenom;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_login'] = $login;
        if ($nouvelleImage !== null) {
            $_SESSION['user_photo'] = $nouvelleImage;
        }

        $_SESSION['alert_type'] = "success";
        $_SESSION['alert_message'] = "Profil mis à jour avec succès.";
        header('Location: /admin/users/tableUsers.php');
        exit();
    } else {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Erreur lors de la mise à jour du profil.";
        header('Location: /admin/users/tableUsers.php');
        exit();
    }
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Tous les champs requis doivent être remplis.";
    header('Location: /admin/users/tableUsers.php');
    exit();
}
?>