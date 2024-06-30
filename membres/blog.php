<?php
session_start();
require 'config.php';

$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.author_id = users.id ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Blog</h2>
                <?php if ($_SESSION['user_grade'] >= 1): ?>
                    <a href="create_post.php" class="btn btn-primary mb-3">Créer un article</a>
                <?php endif; ?>
                <a href="dashboard.php" class="btn btn-secondary mb-3">Retour à mon profil</a>
                <?php foreach ($posts as $post): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Par <?php echo htmlspecialchars($post['username']); ?> le <?php echo $post['created_at']; ?></h6>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                            <?php if ($post['author_id'] == $_SESSION['user_id'] || $_SESSION['user_grade'] == 2): ?>
                                <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Modifier</a>
                                <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Supprimer</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
