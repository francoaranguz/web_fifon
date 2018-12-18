<?php

include_once 'db.php';

class USer extends DB{

    private $nombre;
    private $username;

    public function userExists($user, $passw){
        $query = $this->connect()->prepare('SELECT * FROM Usuarios WHERE user_name = :user AND pass = :passw'); 
        $query->execute(['user' => $user, 'pass' => $passw]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM Usuarios WHERE user_name = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUSer){
            $this->nombre = $currentUSer['user_nombre'];
            $this->username = $currentUSer['user_name'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

}


?>