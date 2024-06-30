<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] != 2) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];

    $sql = "UPDATE users SET username = ?, email = ?, grade = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $grade, $user_id]);

    header("Location: admin.php");
}
?>
