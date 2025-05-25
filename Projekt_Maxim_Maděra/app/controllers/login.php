<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Načtení potřebných souborů pro práci s databází a uživateli
require_once '../models/Database.php';
require_once '../models/User.php';

// Spuštění session pro ukládání dat
session_start();

// Vytvoření připojení k databázi a instance modelu uživatele
$db = (new Database())->getConnection();
$userModel = new User($db);

// Kontrola, zda byl formulář odeslán metodou POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání a očištění dat z formuláře
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Kontrola vyplnění povinných polí
    if (empty($username) || empty($password)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?error=empty_fields");
        exit();
    }

    // Pokus o přihlášení uživatele
    if ($userModel->login($username, $password)) {
        // Úspěšné přihlášení - načtení dat uživatele a nastavení session
        $user = $userModel->findByUsername($username);
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        // Přesměrování na community stránku
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php");
        exit();
    } else {
        // Neúspěšné přihlášení - přesměrování zpět s chybovou hláškou
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?error=invalid_credentials");
        exit();
    }
} else {
    // Pokud někdo zkusí přistoupit přímo k tomuto souboru
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php");
    exit();
}
?>