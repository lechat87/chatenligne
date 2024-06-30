<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] == 0) {
    header("Location: login.php");
    exit();
}

require 'config.php';

$post_id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post || ($post['author_id'] != $_SESSION['user_id'] && $_SESSION['user_grade'] < 2)) {
    header("Location: blog.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $post_id]);

    header("Location: blog.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Modifier un article</h2>
                        <form action="edit_post.php?id=<?php echo $post_id; ?>" method="post">
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Contenu</label>
                                <textarea name="content" class="form-control" rows="10" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                        </form>
                        <a href="blog.php" class="btn btn-link btn-block">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
