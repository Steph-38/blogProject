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
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}






