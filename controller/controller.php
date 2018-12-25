<?php 
// Chargement des classes
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/MemberManager.php';
require_once 'model/ConnexionManager.php';

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
}

// Disponibilité du pseudo dans la db
function freeMember($pseudo) {
    $freeMember = new MemberManager();
    $member = $freeMember->MMfreeMember($pseudo);
    return $member;
}

function login($pseudo, $pass) {
    $connexion = new ConnexionManager();
    $login = $connexion->CMlogin($pseudo);
    $password = password_verify($pass, $login['pass']);
    if (!$password) {
        throw new Exception('Mauvais identifiant ou mot de passe !');
    } else {
        session_start();
        $_SESSION['id'] = $login['id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['status_id'] = $login['status_id'];
        header('Location: index.php?action=listPosts');
    }
    
}

function logout() {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

function addPost($title, $content) {
    $postManager = new PostManager();
    $addPost = $postManager->PMaddPost($title, $content);
    header('Location: index.php?action=listPosts');
}



