<?php

session_start();

$_SESSION['alert_message'] = '';
$_SESSION['alert_type'] = '';

// Vérification de l'appel via le formulaire
if (count($_POST) == 0) {
    // Si le le tableau est vide, on affiche le formulaire
    header('location: contact.php');
} else {

    $affichage_retour = '';    // Lignes à ajouter au début des vérifications
    $erreurs = 0;

    // Vérification des données du formulaire
    // Exemple pour le nom
    if (!empty($_POST['nom'])) {
        $nom = $_POST['nom'];
    } else {
        $affichage_retour .= 'Le champ NOM est obligatoire<br>';
        $erreurs++;
        //header('location: ../contact.php');
    }

    if (!empty($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    } else {
        $affichage_retour .= 'Le champ PRENOM est obligatoire<br>';
        $erreurs++;
        //header('location: ../contact.php');
    }

    if (!empty($_POST['message'])) {
        $message = $_POST['message'];
    } else {
        $affichage_retour .= 'Le champ MESSAGE est obligatoire<br>';
        $erreurs++;
        //header('location: ../contact.php');
    }

    if (!empty($_POST['email'])) {
        // Si le champ email contient des données
        // Verification du format de l'email
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
        } else {
            // Si l'email est incorrect on retourne au formulaire
            $affichage_retour .= 'Adresse mail incorrecte<br>';
            $erreurs++;
            //header('location: ../contact.php');
        }
        // Si le champ email est vide, on retourne au formulaire
    } else {
        $affichage_retour .= 'Le champ EMAIL est obligatoire<br>';
        $erreurs++;
        //header('location: ../contact.php');
    }

    if ($erreurs == 0) {
        // Préparation des données
        // Récupération des données du formulaire

        $prenom = ucfirst($prenom);
        $nom = ucfirst($nom);

        $subject = 'Jard\'Unis : demande de contact de ' . $prenom . ' ' . $nom;
        $subject2 = 'Jard\'Unis : Confirmation de votre demande de contact';
        $contenu_email = "
        <html>
        <head>
            <style>
                body {
                    background-color: #000;
                    padding: 20px;
                    font-family: 'Albert Sans', sans-serif;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #000;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    color: #f9ad0e;
                }
                p {
                    margin-bottom: 10px;
                    color: #fff;
                }
            </style>
        </head>
        <body>
        <div class='container'>
            <h1>Demande de contact</h1>
            <p>Bonjour <strong>$prenom $nom</strong>,</p>
            <p>Votre demande de contact a été transmise.</p>
            <p>Votre demande :</p>
            <p>$message</p>
            <p>Cordialement,</p>
            <p>L'équipe de Jard'Unis</p>
        </div>
        </body>
        </html>";
            $contenu_email_2 = "
        <html>
        <head>
            <style>
                body {
                    background-color: #000;
                    padding: 20px;
                    font-family: 'Albert Sans', sans-serif;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #000;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    color: #f9ad0e;
                }
                p {
                    margin-bottom: 10px;
                    color: #fff;
                }
            </style>
        </head>
        <body>
        <div class='container'>
            <h1>Confirmation de la demande de contact</h1>
            <p>Bonjour <strong>$prenom $nom</strong>,</p>
            <p>Votre demande de contact a été transmise.</p>
            <p>Votre demande :</p>
            <p>$message</p>
            <p>Cordialement,</p>
            <p>L'équipe de Jard'Unis</p>
        </div>
        </body>
        </html>";


        //MAIL DE CONTACT
        $headers['From'] = $email;                            // Pour pouvoir répondre à la demande de contact
        $headers['Reply-to'] = $email;                        // On donne l'adresse de l'utilisateur comme adresse de réponse
        $headers['X-Mailer'] = 'PHP/' . phpversion();            // On précise quel programme à généré le mail
        $headers['MIME-Version'] = '1.0';
        $headers['content-type'] = 'text/html; charset=utf-8';

        // On fixe l'adresse du destinataire - Pour ce Mail il s'agit de notre adresse MMI@mmi-troyes.fr
        $email_dest = "lucyfeneyrol@gmail.com";

        // Envoi de l'email avec le contenu approprié
        if (isset($contenu_email)) {
            if (mail($email_dest, $subject, $contenu_email, $headers)) {
                $erreurs = 0;
            } else {
                $erreurs++;
            }
        }

        // Préparation des données pour la confirmation
        //MAIL DE CONFIRMATION
        $headers2['From'] = $email_dest;                            // Pour pouvoir répondre à la demande de contact
        $headers2['Reply-to'] = $email_dest;                        // On donne l'adresse de l'utilisateur comme adresse de réponse
        $headers2['X-Mailer'] = 'PHP/' . phpversion();            // On précise quel programme à généré le mail
        $headers2['MIME-Version'] = '1.0';
        $headers2['content-type'] = 'text/html; charset=utf-8';

        //Envoi du mail de confirmation
        if (mail($email, $subject2, $contenu_email_2, $headers2)) {
            $erreurs = 0;
        } else {
            $erreurs++;
        }

        if ($erreurs != 0) {
            $affichage_retour = "Echec de l'envoi du message | $erreurs";
            echo $affichage_retour;
        } else {
            $affichage_retour = 'Votre demande a bien été envoyée';
            echo $affichage_retour;
        }
    }
    switch ($erreurs) {
        case 1:
            $_SESSION['alert_type'] = 'error';
            break;
        case 0:
            $_SESSION['alert_type'] = 'success';
            break;
        default:
            $_SESSION['alert_type'] = 'error';
            break;
    }
    $_SESSION['alert_message'] = $affichage_retour;

    header('location: ../contact.php');
}
?>