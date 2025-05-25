<?php
// Třída pro práci s články v databázi
class Article {
    private $db;

    // Konstruktor - inicializace připojení k databázi
    public function __construct($db) {
        $this->db = $db;
    }

    // Získání všech článků
    public function getAll() {
        $stmt = $this->db->prepare("
            SELECT a.*, u.username 
            FROM articles a 
            JOIN users u ON a.user_id = u.id 
            ORDER BY a.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Získání článku podle ID
    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT a.*, u.username 
            FROM articles a 
            JOIN users u ON a.user_id = u.id 
            WHERE a.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Vytvoření nového článku
    public function create($title, $content, $user_id) {
        $stmt = $this->db->prepare("
            INSERT INTO articles (title, content, user_id, created_at) 
            VALUES (?, ?, ?, NOW())
        ");
        return $stmt->execute([$title, $content, $user_id]);
    }

    // Aktualizace existujícího článku
    public function update($id, $title, $content) {
        $stmt = $this->db->prepare("
            UPDATE articles 
            SET title = ?, content = ? 
            WHERE id = ?
        ");
        return $stmt->execute([$title, $content, $id]);
    }

    // Smazání článku
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>