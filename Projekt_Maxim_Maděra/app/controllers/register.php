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
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $surname = !empty($_POST['surname']) ? trim($_POST['surname']) : null;
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // Kontrola vyplnění povinných polí
    if (empty($username) || empty($password) || empty($password_confirm)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/register.php?error=empty_fields");
        exit();
    }

    // Kontrola, zda se hesla shodují
    if ($password !== $password_confirm) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/register.php?error=passwords_dont_match");
        exit();
    }

    // Kontrola, zda uživatelské jméno již neexistuje
    if ($userModel->existsByUsername($username)) {
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/register.php?error=username_taken");
        exit();
    }

    // Pokus o registraci uživatele
    if ($userModel->register($username, $email, $password, $name, $surname)) {
        // Úspěšná registrace - přesměrování na přihlášení
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php");
        exit();
    } else {
        // Neúspěšná registrace - přesměrování zpět s chybovou hláškou
        header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/register.php?error=registration_failed");
        exit();
    }
} else {
    // Pokud někdo zkusí přistoupit přímo k tomuto souboru, přesměrujeme ho na registrační formulář
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/register.php");
    exit();
}
?>