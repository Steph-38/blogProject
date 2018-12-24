
<?php
require_once 'model/Manager.php';

class MemberManager extends Manager {
    
    public function MMaddMember($pseudo, $pass, $email) {
        $db= $this->dbConnect();
        $member = $db->prepare("INSERT INTO members(pseudo, pass, email, register_date, status_id)
        VALUES(:pseudo, :pass, :email, CURDATE(), 4)");
        $member->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass,
            'email' => $email
        ));
        return $member;
    }
    
    public function MMfreeMember($pseudo) {
        $db = $this->dbConnect();
        $recovery = $db->prepare("SELECT pseudo FROM members WHERE pseudo = ?");
        $recovery->execute(array($pseudo));
        $result = $recovery->fetch();
        return $result;
    }
}