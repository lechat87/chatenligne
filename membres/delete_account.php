<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['user_id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        session_destroy();
        header("Location: register.php");
    } else {
        echo "Erreur lors de la suppression du compte";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer mon compte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Supprimer mon compte</h2>
                        <p class="text-center">Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
                        <form action="delete_account.php" method="post">
                            <button type="submit" class="btn btn-danger btn-block">Oui, supprimer mon compte</button>
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
