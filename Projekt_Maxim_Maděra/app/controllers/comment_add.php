<?php
// Načtení potřebných souborů pro práci s databází a komentáři
require_once '../models/Database.php';
require_once '../models/Comment.php';

// Spuštění session pro přístup k session datům
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?error=please_login");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article_id = (int)$_POST['article_id'];
    $content = htmlspecialchars($_POST['content'] ?? '');

    if (empty($content)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php?error=empty_comment");
        exit();
    }

    $db = (new Database())->getConnection();
    $commentModel = new Comment($db);

    if ($commentModel->create($article_id, $_SESSION['user_id'], $content)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
        exit();
    } else {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php?error=comment_failed");
        exit();
    }
} else {
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
    exit();
}
?> 