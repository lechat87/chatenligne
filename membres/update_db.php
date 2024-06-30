<?php
require 'config.php';

try {
    $sql = file_get_contents('update_database.sql');
    $pdo->exec($sql);
    echo "La base de données a été mise à jour avec succès.";
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour de la base de données : " . $e->getMessage();
}
?>
