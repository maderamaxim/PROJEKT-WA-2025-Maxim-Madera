<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Načtení potřebných souborů pro práci s databází a články
require_once '../models/Database.php';
require_once '../models/Article.php';
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
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');
    $user_id = $_SESSION['user_id'];

    if (empty($title) || empty($content)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/articles/article_create.php?error=empty_fields");
        exit();
    }

    // Vytvoření instance kontroleru článků a vytvoření článku
    $controller = new ArticleController();
    if ($controller->createArticle()) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
        exit();
    } else {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/articles/article_create.php?error=creation_failed");
        exit();
    }
} else {
    // Pokud někdo zkusí přistoupit přímo k tomuto souboru
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/articles/article_create.php");
    exit();
}
?> 