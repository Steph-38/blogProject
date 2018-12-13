<?php
require 'controller/controller.php';

try {
    if (isset($_GET['action'])) {
        // Affichage des billets
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } 
        // Affichage d'un billet en particulier
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } 
        // Ajout d'un commentaire
        elseif ($_GET['action'] == 'addComment') {
            // Controle de l'id du billet
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Controle des champs du formulaire
                if (! empty($_POST['author']) && ! empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        // Affichage de la page d'inscription membre
        elseif ($_GET['action'] == 'viewMember') {
            require 'view/addMemberView.php';
        }
        // Inscription d'un membre
        elseif ($_GET['action'] == 'addMember') {
            // Contrôle des champs de formulaire
            if (! empty($_POST['pseudo']) && ! empty($_POST['email']) && ! empty($_POST['pass'])) {
                // Controle du mot de passe
                if (freeMember($_POST['pseudo']) == null) {
                    if ($_POST['pass'] == $_POST['pass2']) {
                        $passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        addMember($_POST['pseudo'], $passHash, $_POST['email']);
                    } else {
                        throw new Exception('Les mots de passe ne sont pas identique');
                    }
                } else {
                    throw new Exception('Le pseudo est déjà pris');
                }
                

            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}






