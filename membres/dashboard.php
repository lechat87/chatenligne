<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if ($user['grade'] == 0) {
    echo "Votre compte est banni.";
    exit();
}

if ($user['grade'] == 2) {
    // Récupérez le compteur de rickroll
    $sql = "SELECT rickroll_count FROM stats WHERE id = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rickroll_count = $stmt->fetchColumn();

    // Mise à jour du compteur
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rickroll_count'])) {
        $new_count = (int)$_POST['rickroll_count'];
        $sql = "UPDATE stats SET rickroll_count = ? WHERE id = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$new_count]);
        $rickroll_count = $new_count;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styles pour le modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenue, <?php echo htmlspecialchars($user['username']); ?> !</h1>
            <a href="logout.php" class="btn btn-logout" style="display : none;">Se déconnecter</a>
            <a href="blog.php" class="btn">Blog</a>
            <a href="logout.php" class="btn btn-logout">Se déconnecter</a>
        </header>
        <main>
            <div class="card">
                <h2>Vos informations</h2>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Grade:</strong> <?php echo $user['grade'] == 2 ? 'Admin' : 'Utilisateur'; ?></p>
            </div>
            <?php if ($user['grade'] == 2): ?>
                <div class="card">
                    <h2>Administration</h2>
                    <p><strong>Rickroll count:</strong> <?php echo $rickroll_count; ?></p>
                    <button id="editBtn" class="btn btn-admin">Modifier le compteur</button>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <!-- Le modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post">
                <label for="rickroll_count">Modifier le compteur :</label>
                <input type="number" name="rickroll_count" value="<?php echo $rickroll_count; ?>">
                <button type="submit">Mettre à jour</button>
            </form>
        </div>
    </div>

    <script>
        // Script pour gérer le modal
        var modal = document.getElementById("editModal");
        var btn = document.getElementById("editBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
