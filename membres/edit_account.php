<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

    if ($password) {
        $sql = "UPDATE users SET email = ?, password = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$email, $password, $id])) {
            header("Location: dashboard.php");
        } else {
            echo "Erreur lors de la mise à jour";
        }
    } else {
        $sql = "UPDATE users SET email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$email, $id])) {
            header("Location: dashboard.php");
        } else {
            echo "Erreur lors de la mise à jour";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier mon compte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Modifier mon compte</h2>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="edit_account.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Nouveau mot de passe (laisser vide pour conserver le mot de passe actuel)</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                        </form>
                        <a href="dashboard.php" class="btn btn-link btn-block">Annuler</a>
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
