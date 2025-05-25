<?php
// Třída pro práci s databázovým připojením
class Database {
    // Konfigurační údaje pro připojení k databázi
    private $host = "localhost";
    private $db_name = "projekt_maxim_maděra";
    private $username = "root";
    private $password = "";
    private $conn;

    // Metoda pro získání připojení k databázi
    public function getConnection() {
        $this->conn = null;

        try {
            // Vytvoření PDO připojení k databázi
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Nastavení PDO na vyhazování výjimek při chybách
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Nastavení výchozího kódování na UTF-8
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            // Výpis chyby při selhání připojení
            echo "Chyba připojení k databázi: " . $e->getMessage();
        }

        return $this->conn;
    }
}

// Pro otestování připojení stačí tento soubor spustit
// Můžete tento kód zakomentovat po ověření
// $database = new Database();
// $database->getConnection();