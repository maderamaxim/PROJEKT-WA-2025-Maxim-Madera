<?php
require_once '../../models/Database.php';
require_once '../../models/Article.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php?error=please_login");
    exit();
}
$db = (new Database())->getConnection();
$articleModel = new Article($db);
$articles = $articleModel->getAll();
$editMode = false;
$articleToEdit = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $articleToEdit = $articleModel->getById($editId);
    if ($articleToEdit) {
        $editMode = true;
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazání článků</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../../../include/logo/favicon.ico">
</head>
<body class="bg-light">
    <?php include '../../../include/navbar.php'; ?>

    <div class="container mt-5">
        <?php if ($editMode): ?>
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h2 class="mb-0">Upravit článek: <?= htmlspecialchars($articleToEdit['title']) ?></h2>
                        </div>
                        <div class="card-body">
                            <form action="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_update.php" method="post">
                                <input type="hidden" name="id" value="<?= $articleToEdit['id'] ?>">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Název článku:</label>
                                    <input type="text" id="title" name="title" class="form-control" required 
                                           value="<?= htmlspecialchars($articleToEdit['title']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Obsah:</label>
                                    <textarea id="content" name="content" class="form-control" rows="5" required><?= htmlspecialchars($articleToEdit['content']) ?></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php" class="btn btn-secondary">Zpět</a>
                                    <button type="submit" class="btn btn-primary">Uložit změny</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Seznam článků</h2>
            </div>
            <div class="card-body">
                <?php if (!empty($articles)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Název</th>
                                    <th>Obsah</th>
                                    <th>Vytvořeno</th>
                                    <th>Akce</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($article['id']) ?></td>
                                        <td><?= htmlspecialchars($article['title']) ?></td>
                                        <td><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                                        <td><?= htmlspecialchars($article['created_at']) ?></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="?edit=<?= $article['id'] ?>" class="btn btn-warning btn-sm">Upravit</a>
                                                <a href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/article_delete.php?id=<?= $article['id'] ?>" 
                                                   class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('Opravdu chcete smazat tento článek?');">Smazat</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">Žádný článek nebyl nalezen.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include '../../../include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>