<?php
namespace App;

use PDO;
use Database\Database;

class User {

    public $pdo;

    public static function Login(string $login, string $password)
    {
        $query = Database::connect_db()->prepare('SELECT * FROM utilisateurs WHERE login = :login');
        $query->execute(['login' => $login]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user === false) {
            return null;
        }
        if (password_verify($password, $user['password'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['auth'] = $user;
            return $user;
        }
    }
    public static function Register(string $login, string $password): int
    {
        $error = 0;
        $req = "SELECT login FROM utilisateurs WHERE login='$login'";
        $stmt = Database::connect_db()->query($req);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $error = 1;
        } else {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $query_insert = "INSERT INTO utilisateurs (login,password) VALUES (:login, :password)";
            $query_insert_res = Database::connect_db()->prepare($query_insert);
            $query_insert_res->bindParam(':login', $login);
            $query_insert_res->bindParam(':password', $password);
            $query_insert_res->execute(array(
                ":login" => $login,
                ":password" => $password_hash
            ));
        }
        return $error;
    }

    public static function changeLogin($login, $new_login):bool
    {
        $sql = "UPDATE utilisateurs SET login=:newlogin WHERE login=:login";
        $stmt= Database::connect_db()->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":newlogin", $new_login, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        $query = Database::connect_db()->prepare('SELECT * FROM utilisateurs WHERE login = :login');
        $query->execute(['login' => $new_login]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['auth'] = $user;
        return $estModifier;
    }
    public static function changePassword($new_password, $id)
    {
        $pwd_hash = password_hash($new_password, PASSWORD_BCRYPT);
        $sql = "UPDATE utilisateurs SET password=:new_password WHERE id =:id";
        $stmt = Database::connect_db()->prepare($sql);
        $stmt->execute(array(
            ":new_password" => $pwd_hash,
            ":id" => $id
        ));
    }
}