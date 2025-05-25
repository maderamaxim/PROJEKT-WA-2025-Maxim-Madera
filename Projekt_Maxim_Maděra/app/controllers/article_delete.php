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

// Kontrola, zda bylo zadáno ID článku
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);
    $article = $articleModel->getById($id);
    
    // Kontrola oprávnění ke smazání článku
    if ($article && ($article['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] === 'admin')) {
        if ($articleModel->delete($id)) {
            header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
            exit();
        } else {
            echo "Chyba při mazání článku.";
        }
    } else {
        echo "Článek nebyl nalezen nebo nemáte oprávnění k jeho smazání.";
    }
} else {
    echo "Neplatný požadavek.";
}

// Kontrola, zda byl požadavek odeslán metodou POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání ID článku z formuláře
    $id = $_POST['id'] ?? '';

    // Kontrola, zda bylo ID zadáno
    if (empty($id)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php?error=missing_id");
        exit();
    }

    // Vytvoření instance kontroleru článků a smazání článku
    $controller = new ArticleController();
    if ($controller->deleteArticle($id)) {
        // Úspěšné smazání - přesměrování na seznam článků
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php?success=deleted");
        exit();
    } else {
        // Chyba při mazání - přesměrování zpět s chybovou hláškou
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php?error=delete_failed");
        exit();
    }
} else {
    // Pokud někdo zkusí přistoupit přímo k tomuto souboru, přesměrujeme ho na seznam článků
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_list.php");
    exit();
}
?>