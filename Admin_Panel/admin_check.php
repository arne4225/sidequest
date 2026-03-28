<?php

session_start();

require_once '../Dashboard/DB.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT admin FROM users WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user || !$user['admin']) {
    session_destroy();
    header("Location: dashboard.php");
    exit;
}