<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../models/Database.php';
require_once '../models/Article.php';

// Třída pro správu článků
class ArticleController {
    private $db;
    private $articleModel;

    // Konstruktor - inicializace připojení k databázi a modelu článků
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->articleModel = new Article($this->db);
    }

    // Kontrola, zda je uživatel přihlášen
    private function isUserLoggedIn() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }

    // Zobrazení seznamu všech článků
    public function listArticles() {
        if (!$this->isUserLoggedIn()) {
            header("Location: ../views/auth/login.php?error=please_login");
            exit();
        }
        $articles = $this->articleModel->getAll();
        include '../views/articles/article_list.php';
    }

    // Zobrazení detailu článku
    public function showArticle($id) {
        $article = $this->articleModel->getById($id);
        if ($article) {
            require_once '../views/articles/detail.php';
        } else {
            header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php");
            exit();
        }
    }

    // Zobrazení formuláře pro vytvoření článku
    public function showCreateForm() {
        if (!$this->isUserLoggedIn()) {
            header("Location: ../views/auth/login.php?error=please_login");
            exit();
        }
        include '../views/articles/article_create.php';
    }

    // Zobrazení formuláře pro úpravu článku
    public function showEditForm($id) {
        $article = $this->articleModel->getById($id);
        if ($article) {
            require_once '../views/articles/edit.php';
        } else {
            header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php");
            exit();
        }
    }

    // Vytvoření nového článku
    public function createArticle() {
        if (!$this->isUserLoggedIn()) {
            header("Location: ../views/auth/login.php?error=please_login");
            exit();
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = htmlspecialchars($_POST['title'] ?? '');
            $content = htmlspecialchars($_POST['content'] ?? '');
            $user_id = $_SESSION['user_id'];
    
            if (empty($title) || empty($content)) {
                header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/articles/article_create.php?error=empty_fields");
                exit();
            }
    
            if ($this->articleModel->create($title, $content, $user_id)) {
                header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
                exit();
            } else {
                header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/articles/article_create.php?error=creation_failed");
                exit();
            }
        }
    }

    // Aktualizace existujícího článku
    public function updateArticle($id, $title, $content) {
        if (empty($title) || empty($content)) {
            return false;
        }
        return $this->articleModel->update($id, $title, $content);
    }

    // Smazání článku
    public function deleteArticle($id) {
        return $this->articleModel->delete($id);
    }
}

// Zpracování požadavku
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ArticleController();
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $controller->createArticle();
                break;
            // Add other actions here as needed
        }
    }
}
?>