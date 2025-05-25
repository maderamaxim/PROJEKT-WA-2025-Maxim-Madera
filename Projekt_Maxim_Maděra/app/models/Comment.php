<?php
// Třída pro práci s komentáři v databázi
class Comment {
    private $conn;
    private $table_name = "comments";

    // Konstruktor - inicializace připojení k databázi
    public function __construct($db) {
        $this->conn = $db;
    }

    // Získání všech komentářů pro konkrétní článek
    public function getByArticleId($article_id) {
        $query = "SELECT c.*, u.username 
                 FROM " . $this->table_name . " c 
                 JOIN users u ON c.user_id = u.id 
                 WHERE c.article_id = :article_id 
                 ORDER BY c.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":article_id", $article_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Přidání nového komentáře
    public function create($article_id, $user_id, $content) {
        $query = "INSERT INTO " . $this->table_name . " (article_id, user_id, content, created_at) 
                 VALUES (:article_id, :user_id, :content, NOW())";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":article_id", $article_id);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":content", $content);

        return $stmt->execute();
    }

    // Smazání komentáře
    public function delete($id, $user_id) {
        $query = "DELETE FROM " . $this->table_name . " 
                 WHERE id = :id AND user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":user_id", $user_id);

        return $stmt->execute();
    }

    // Kontrola, zda komentář patří danému uživateli
    public function belongsToUser($comment_id, $user_id) {
        $stmt = $this->conn->prepare("
            SELECT id 
            FROM " . $this->table_name . " 
            WHERE id = :comment_id AND user_id = :user_id
        ");
        $stmt->bindParam(":comment_id", $comment_id);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        return $stmt->fetch() !== false;
    }
}
?> 