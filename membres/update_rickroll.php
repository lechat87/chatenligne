<?php
require __DIR__ . '/config.php';

try {
    // Vérifiez si une entrée existe déjà
    $sql = "SELECT rickroll_count FROM stats WHERE id = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result) {
        // Incrémentez le compteur existant
        $sql = "UPDATE stats SET rickroll_count = rickroll_count + 1 WHERE id = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else {
        // Créez une nouvelle entrée si elle n'existe pas
        $sql = "INSERT INTO stats (id, rickroll_count) VALUES (1, 1)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    // Définir un cookie pour éviter de re-compter les rickrolls (valide 10 secondes)
    setcookie('rickroll', '1', time() + 10, "/"); // Cookie valide 10 secondes

    // Rediriger vers dontreadme/index.html
    header("Location: /dontreadme/index.html");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
