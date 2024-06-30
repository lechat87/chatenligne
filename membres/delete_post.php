<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] == 0) {
    header("Location: login.php");
    exit();
}

require 'config.php';

// Vérifier si l'ID de l'article est fourni dans l'URL
if (!isset($_GET['id'])) {
    header("Location: admin.php"); // Rediriger vers la page d'administration si l'ID de l'article est manquant
    exit();
}

$post_id = $_GET['id'];

// Vérifier si l'utilisateur a le droit de supprimer cet article
$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post || ($post['author_id'] != $_SESSION['user_id'] && $_SESSION['user_grade'] < 2)) {
    header("Location: blog.php"); // Rediriger vers la page de blog si l'utilisateur n'est pas autorisé à supprimer cet article
    exit();
}

// Supprimer l'article de la base de données
$sql = "DELETE FROM posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$post_id]);

header("Location: blog.php"); // Rediriger vers la page de blog après la suppression de l'article
?>
