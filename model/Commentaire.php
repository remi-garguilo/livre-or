<?php

namespace App;
use PDO;
use Database\Database;

Class Commentaire {

    public static function getCommentaire($id_user, $commentaire) {
        $sql = "INSERT INTO commentaires (commentaire, id_utilisateur) VALUES (:commentaire, :id_user)";
        $stmt = Database::connect_db()->prepare($sql);
        $stmt->bindValue(":commentaire", $commentaire, PDO::PARAM_STR);
        $stmt->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        $query = Database::connect_db()->prepare('SELECT * FROM commentaires');
        $query->execute();
        $comm = $query->fetch(PDO::FETCH_ASSOC);
        return $comm;
    }
    public static function showCommentaire() {
        $sql = "SELECT * FROM commentaires ORDER BY date DESC";
        $stmt = Database::connect_db()->prepare($sql);
        $stmt->execute();
        $comm = $stmt->fetchAll();
        return $comm;
    }
}