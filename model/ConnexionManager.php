<?php
require_once 'model/Manager.php';

class ConnexionManager extends Manager {
    
    public function CMconnexion($pseudo) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id, pass FROM members WHERE pseudo = ?");
        $req->execute(array($pseudo));
        $result = $req->fetch();
        
        return $result;
    }
}