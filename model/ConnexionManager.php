<?php
require_once 'model/Manager.php';

class ConnexionManager extends Manager {
    
    public function CMlogin($pseudo) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, pseudo, pass FROM members WHERE pseudo = :pseudo");
        $req->execute(array(
            'pseudo' => $pseudo
        ));
        $result = $req->fetch();
        
        return $result;
    }
}