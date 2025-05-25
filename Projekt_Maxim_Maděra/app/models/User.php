<?php
// Třída pro práci s uživateli v databázi
class User {
    private $db;

    // Konstruktor - inicializace připojení k databázi
    public function __construct($db) {
        $this->db = $db;
    }

    // Kontrola existence uživatelského jména v databázi
    public function existsByUsername($username) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch() !== false;
    }

    // Registrace nového uživatele
    public function register($username, $email, $password, $name = null, $surname = null) {
        // Hashování hesla pro bezpečné uložení
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // SQL dotaz pro vložení nového uživatele
        $stmt = $this->db->prepare("
            INSERT INTO users (username, email, password_hash, name, surname, created_at, role)
            VALUES (?, ?, ?, ?, ?, NOW(), 'user')
        ");
        return $stmt->execute([$username, $email, $password_hash, $name, $surname]);
    }

    // Vyhledání uživatele podle uživatelského jména
    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Přihlášení uživatele
    public function login($username, $password) {
        $user = $this->findByUsername($username);
        // Ověření hesla a nastavení session
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }
}
?>