<?php 

class UserManager extends ManagerData {


    public function add(User $user) {

       $req = $this->dbConnect()->prepare('INSERT INTO user(username, password, email, date_creation) VALUES(:username, :password, :email, NOW())');
        $req->execute([
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail()
        ]);
       
    }    

    public function login($pseudo) {
        $req = $this->dbConnect()->prepare('SELECT * FROM user WHERE username = :pseudo');
        $req->execute([
            ':pseudo' => $pseudo
        ]);
        $user = $req->fetch();
        return $user;
    }
}

