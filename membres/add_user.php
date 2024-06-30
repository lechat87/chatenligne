<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_grade'] != 2) {
    header("Location: login.php");
    exit();
}

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $grade = $_POST['grade'];

    $sql = "INSERT INTO users (username, email, password, grade) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $password, $grade]);

    header("Location: admin.php");
}
?>
