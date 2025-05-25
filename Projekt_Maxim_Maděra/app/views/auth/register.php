<?php session_start(); ?> <!-- Spuštění session pro ukládání dat -->
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <!-- Načtení Bootstrap CSS pro stylování -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../../../include/logo/favicon.ico">
</head>

    <body class="bg-light">
    <?php include '../../../include/navbar.php';?> <!-- Vložení navigačního menu -->

    <!-- Hlavička stránky -->
    <header class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Registrace</h1>
            <p class="lead fw-bold">Zaregistruj se na tomto blogu a získej přístup k diskuzi!</p>
        </div>
    </header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Registrace</h3>
                    </div>
                    <div class="card-body">
                        <!-- Zobrazení chybových hlášek -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">
                                <?php
                                // Přepínač pro různé typy chyb
                                switch ($_GET['error']) {
                                    case 'empty_fields':
                                        echo 'Vyplňte prosím všechna povinná pole.';
                                        break;
                                    case 'username_taken':
                                        echo 'Uživatelské jméno už je registrováno.';
                                        break;
                                    case 'passwords_dont_match':
                                        echo 'Hesla se neshodují.';
                                        break;
                                    default:
                                        echo 'Registrace se nedokončila. Zkontrolujte údaje.';
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Registrační formulář -->
                        <form id="registrationForm" action="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/register.php" method="post">
                            <!-- Pole pro uživatelské jméno -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno: <span class="text-danger">*</span></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <!-- Pole pro email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail (nepovinný):</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <!-- Pole pro jméno -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Jméno (nepovinné):</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <!-- Pole pro příjmení -->
                            <div class="mb-3">
                                <label for="surname" class="form-label">Příjmení (nepovinné):</label>
                                <input type="text" id="surname" name="surname" class="form-control">
                            </div>
                            <!-- Pole pro heslo -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Heslo: <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <!-- Pole pro potvrzení hesla -->
                            <div class="mb-3">
                                <label for="password_confirm" class="form-label">Potvrzení hesla: <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                            </div>
                            <!-- Tlačítko pro odeslání formuláře -->
                            <button type="submit" class="btn btn-success w-100">Registrovat se</button>
                        </form>
                        <!-- Odkaz na přihlášení -->
                        <div class="mt-3 text-center">
                            <p>Už máte účet? <a href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php">Přihlaste se</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../../include/footer.php'; ?>
    <!-- Načtení Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>