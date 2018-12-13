<?php 
// Chargement des classes
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/MemberManager.php';

// Affichage des 5 derniers billets
function listPosts() {
    $postManager = new PostManager();
    // Appel d'une fonction sur l'objet créé
    $posts = $postManager->getPosts();
    require('view/listPostsView.php');
}

// Affichage des commentaires d'un billet
function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/postView.php');
}

// Ajout d'un commentaire
function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur sera remontée jusqu'au bloc try du routeur
        throw new Exception("Impossible d'ajouter le commentaire !");
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
    
}

// Inscription d'un membre
function addMember($pseudo, $pass, $email) {
    $memberManager = new MemberManager();
    $member = $memberManager->MMaddMember($pseudo, $pass, $email);
    header('Location: index.php?action=viewMember');
}

function freeMember($pseudo) {
    $freeMember = new MemberManager();
    $member = $freeMember->MMfreeMember($pseudo);
    return $member;
}


