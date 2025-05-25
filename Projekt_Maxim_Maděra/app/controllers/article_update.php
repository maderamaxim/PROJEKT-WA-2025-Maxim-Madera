<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Načtení potřebných souborů pro práci s databází, články a uživateli
require_once '../models/Database.php';
require_once '../models/Article.php';
require_once '../models/User.php';
require_once 'ArticleController.php';

// Spuštění session pro přístup k session datům
session_start();

// Kontrola, zda je uživatel přihlášen
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?error=please_login");
    exit();
}

// Kontrola, zda byl formulář odeslán metodou POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');

    if (empty($title) || empty($content)) {
        echo "Vyplňte prosím všechna pole.";
        return;
    }

    // Vytvoření připojení k databázi a načtení článku
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);
    $article = $articleModel->getById($id);

    // Kontrola oprávnění k úpravě článku
    if ($article && ($article['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] === 'admin')) {
        if ($articleModel->update($id, $title, $content)) {
            header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
            exit();
        } else {
            echo "Chyba při aktualizaci článku.";
        }
    } else {
        echo "Článek nebyl nalezen nebo nemáte oprávnění k jeho úpravě.";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Zobrazení formuláře pro úpravu článku
    $id = (int)$_GET['id'];
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);
    $article = $articleModel->getById($id);
    
    // Kontrola oprávnění k úpravě článku
    if ($article && ($article['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] === 'admin')) {
        $_GET['edit'] = $id;
        include '../views/articles/article_edit_delete.php';
    } else {
        echo "Článek nebyl nalezen nebo nemáte oprávnění k jeho úpravě.";
    }
} else {
    // Pokud někdo zkusí přistoupit přímo k tomuto souboru, přesměrujeme ho na seznam článků
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php");
    exit();
}
?>