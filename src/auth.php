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

    }
    public function login(string $user, string $password): ?User
    {
        $query =$this->pdo->prepare('SELECT * FROM admin WHERE user=:user');
        $query->execute(['user'=> $user]);
        $user =$query->fetchObject(User::class);

        if($user === false){
            return null;
        }
        if($user->password === $password){
            return $user;
        }
        return null;
    }
}