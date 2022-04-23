<?php
namespace App;
use PDO;
class Auth{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user(): ?User
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $id= $_SESSION['auth'] ?? null ;
        if($id === null){
            return null;
        }
        $query =$this->pdo->prepare('SELECT * FROM admin WHERE id= ?');
        $query->execute([$id]);
        $user =$query->fetchObject(User::class);
        return $user ?: null;
    }

    public function login(string $user, string $password): ?User
    {
        // on trouve le bon utilisateur 
        $query =$this->pdo->prepare('SELECT * FROM admin WHERE user=:user');
        $query->execute(['user'=> $user]);
        $user =$query->fetchObject(User::class);

        // on verifie si notre identifiant est valide
        if($user === false){
            return null;
        }

        // on verifie si le password coorespond bien aux information recuperez dans notre requette SQL
        if($user->password === $password){
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            
            $_SESSION['auth']= $user->id;
            return $user;
        }
        
        return null;
    }
}