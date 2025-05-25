<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?error=please_login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Přidat článek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../../include/logo/favicon.ico">
</head>
<body class="bg-light">
    <?php include(__DIR__ . '/../../../include/navbar.php');?> <!-- Volání navbaru -->

    <header class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Vytvoření článku</h1>
        </div>
    </header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <?php if ($_GET['error'] === 'empty_fields'): ?>
                                <div class="alert alert-danger">Vyplňte prosím všechna povinná pole.</div>
                            <?php elseif ($_GET['error'] === 'creation_failed'): ?>
                                <div class="alert alert-danger">Chyba při vytváření článku.</div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <form action="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/ArticleController.php" method="post">
                            <input type="hidden" name="action" value="create">
                            <div class="mb-3">
                                <label for="title" class="form-label">Název článku: <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Obsah: <span class="text-danger">*</span></label>
                                <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Uložit článek</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(__DIR__ . '/../../../include/footer.php');?> <!-- Volání footeru -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>