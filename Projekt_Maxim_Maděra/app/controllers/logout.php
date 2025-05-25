<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Spuštění session pro přístup k session datům
session_start();

// Zničení všech session dat
session_unset();
session_destroy();

// Přesměrování na přihlašovací stránku
header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?message=logged_out");
exit();
?>