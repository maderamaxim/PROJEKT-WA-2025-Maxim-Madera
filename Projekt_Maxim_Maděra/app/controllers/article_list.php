<?php
// Načtení potřebných souborů pro práci s databází a články
require_once '../models/Database.php';
require_once '../models/Article.php';
require_once 'ArticleController.php';

// Spuštění session pro přístup k session datům
session_start();

// Vytvoření instance kontroleru článků a zobrazení seznamu
$controller = new ArticleController();
$controller->listArticles();
?>