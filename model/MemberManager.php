<?php
require_once 'model/Manager.php';

class MemberManager extends Manager {
    public function MMaddMember($pseudo, $pass, $email) {
        $db= $this->dbConnect();
        $member = $db->prepare("INSERT INTO members(pseudo, pass, email, register_date)
        VALUES(:pseudo, :pass, :email, CURDATE())");
        $member->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass,
            'email' => $email
        ));
        
        return $member;
    }
}