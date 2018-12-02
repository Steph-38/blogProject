<?php

class Manager {
    // Permet aux classes filles d'appeler cette fonction
    protected function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=tpblog;charset=utf8', 'root', '');
        return $db;
    }
}