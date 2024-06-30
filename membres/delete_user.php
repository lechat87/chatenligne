<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] != 2) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    header("Location: admin.php");
}
?>
