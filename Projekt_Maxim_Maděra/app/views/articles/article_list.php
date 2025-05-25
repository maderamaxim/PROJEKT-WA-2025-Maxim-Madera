<?php
if (!isset($articles)) {
    $articles = [];
}
if (!isset($articleComments)) {
    $articleComments = [];
}
?>

<?php if (!empty($articles)): ?>
    <?php foreach ($articles as $article): ?>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($article['title']) ?></h2>
                <p class="card-text"><?= nl2br(htmlspecialchars($article['content'])) ?></p>
                <p class="text-muted">Vytvořeno: <?= htmlspecialchars($article['created_at']) ?></p>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['user_id'] == $article['user_id'] || $_SESSION['role'] === 'admin'): ?>
                        <div class="mb-3">
                            <a href="../app/views/articles/article_edit_delete.php?edit=<?= $article['id'] ?>" class="btn btn-warning btn-sm">Upravit</a>
                            <a href="../app/controllers/article_delete.php?id=<?= $article['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Opravdu chcete smazat tento článek?')">Smazat</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Comments Section -->
                <div class="mt-4">
                    <h4 class="mb-3">Komentáře</h4>
                    <div class="d-flex align-items-center gap-3">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form action="../app/controllers/comment_add.php" method="post" class="flex-grow-1 d-flex gap-2">
                                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                <input type="text" name="content" class="form-control form-control-sm" placeholder="Napište komentář..." required>
                                <button type="submit" class="btn btn-primary btn-sm">Přidat</button>
                            </form>
                        <?php endif; ?>
                        <button class="btn btn-outline-primary btn-sm text-nowrap position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#comments-<?= $article['id'] ?>" aria-expanded="false">
                            Zobrazit komentáře
                            <?php if (!empty($articleComments[$article['id']])): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= count($articleComments[$article['id']]) ?>
                                    <span class="visually-hidden">počet komentářů</span>
                                </span>
                            <?php endif; ?>
                        </button>
                    </div>
                </div>
                
                <div class="collapse" id="comments-<?= $article['id'] ?>">
                    <div class="bg-light rounded p-3 mt-3">
                        <?php if (!empty($articleComments[$article['id']])): ?>
                            <?php foreach ($articleComments[$article['id']] as $comment): ?>
                                <div class="border-start border-primary ps-3 mb-3">
                                    <div class="small text-muted">
                                        <strong><?= htmlspecialchars($comment['username']) ?></strong>
                                        <span class="ms-2"><?= htmlspecialchars($comment['created_at']) ?></span>
                                    </div>
                                    <div>
                                        <?= nl2br(htmlspecialchars($comment['content'])) ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted">Zatím žádné komentáře.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info">Žádný článek nebyl nalezen.</div>
<?php endif; ?> 