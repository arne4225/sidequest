<?php
session_start();
require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password1 = $_POST["password1"] ?? '';
    $password2 = $_POST["password2"] ?? '';

    // Validation
    if (empty($username) || empty($email) || empty($password1) || empty($password2)) {
        header("Location: dashboard.php?error=emptyfields");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: dashboard.php?error=invalidemail");
        exit;
    }

    if ($password1 !== $password2) {
        header("Location: dashboard.php?error=passwordmismatch");
        exit;
    }

    if (strlen($password1) < 6) {
        header("Location: dashboard.php?error=passwordshort");
        exit;
    }

    // Check existing user
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);

    if ($stmt->fetch()) {
        header("Location: dashboard.php?error=userexists");
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

    // Insert (LET OP: password_hash kolom!)
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashedPassword]);

    // Auto login
    $_SESSION['user_id'] = $pdo->lastInsertId();

    header("Location: dashboard.php?success=accountcreated");
    exit;
}