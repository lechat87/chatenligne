<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] != 2) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];

    // Mettre à jour le grade de l'utilisateur à "membre" (ou autre grade souhaité)
    $sql = "UPDATE users SET grade = 1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $user_id]);

    header("Location: admin.php");
    exit();
}
?>
