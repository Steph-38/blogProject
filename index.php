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
                // identifiants de connexion
                session_start();
                if (!empty($_SESSION['id']) && !empty($_SESSION['pseudo'])) {
                    // Controle des champs du formulaire
                    if (!empty($_POST['comment'])) {
                        addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
                    } else {
                        throw new Exception('Un commentaire SVP !');
                    }
                } else {
                    throw new Exception('Connexion obligatoire pour l\'ajout de commentaires');
                }

            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        // Affichage de la page d'inscription membre
        elseif ($_GET['action'] == 'viewMember') {
            require 'view/addMemberView.php';
        }
        // Affichage de la page de connexion d'un membre
        elseif ($_GET['action'] == 'viewLogin') {
            require 'view/loginView.php';
        }
        // Inscription d'un membre
        elseif ($_GET['action'] == 'addMember') {
            // Contrôle des champs de formulaire
            if (! empty($_POST['pseudo']) && ! empty($_POST['email']) && ! empty($_POST['pass'])) {
                // Disponibilité du pseudo
                if (freeMember($_POST['pseudo']) == null) {
                    // Hashage et vérification du mot de passe
                    if ($_POST['pass'] == $_POST['pass2']) {
                        $passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        addMember($_POST['pseudo'], $passHash, $_POST['email']);
                        login($_POST['pseudo'], $_POST['pass']);
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
        // Connexion d'un membre
        elseif ($_GET['action'] == 'login') {
            login($_POST['pseudo'], $_POST['pass']);
        }
        // Déconnexion d'un membre
        elseif ($_GET['action'] == 'logout') {
            logout();
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require 'view/errorView.php';
}
