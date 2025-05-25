<?php
if(!isset($_SESSION)) //Kontrola, zda je session spuštěná
{ 
    session_start(); 
} 

require_once '../app/models/Database.php';
require_once '../app/models/Article.php';
require_once '../app/models/Comment.php';

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);
$comment = new Comment($db);

$articles = $article->getAll(); //vrací články z databáze


$articleComments = [];
foreach ($articles as $article) {           //přiřanenní komentářu k příspěvku na základě ID
    $articleComments[$article['id']] = $comment->getByArticleId($article['id']);
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunita – Blog o platebních metodách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../include/logo/favicon.ico">
</head>
<body class="bg-light">
    <?php include '../include/navbar.php'; ?>

    <header class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold">Komunita platebních metod</h1>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <?php if (isset($_SESSION['user_id'])): ?> 
            <div class="d-flex justify-content-start mb-4"> <!-- přidání tlačítka přidat článek pro přihlášené -->
                <a href="../app/views/articles/article_create.php" class="btn btn-primary">Přidat článek</a>
            </div>
        <?php endif; ?>
        
        <?php include '../app/views/articles/article_list.php'; ?> <!-- připojení výpisu článků -->
    </main>

    <?php include '../include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 