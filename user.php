<?php
include './db.php';

class User
{
    public $login;
    public $isAdmin;

    public function __construct($login, $isAdmin)
    {
        $this->login = $login;
        $this->isAdmin = $isAdmin;
    }

    static function login($login, $password)
    {
        $db = DB::getConnection();
        $statement = $db->prepare('SELECT * FROM users WHERE login=:login AND password=:password;');
        $statement->bindValue(':login', $login);
        $statement->bindValue(':password', $password);
        $res = $statement->execute();
        $user = $res->fetchArray();

        if (!$user) {
            return null;
        }

        return new User($login, $user['admin'] ? true : false);
    }
}
