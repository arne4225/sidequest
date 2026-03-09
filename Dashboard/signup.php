<?php

session_start();

require_once "DB.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? '';
    $email = $_POST["email"] ?? '';
    $password1 = $_POST["password1"] ?? '';
    $password2 = $_POST["password2"] ?? '';

    if (empty($username) || empty($email) || empty($password1) || empty($password2)) {
        echo "Fill in all fields";

        header("Location: ../Dashboard/dashboard.php");
        exit;
    }

    if ($password1 !== $password2) {
        echo "Passwords do not match";

        header("Location: ../Dashboard/dashboard.php");
        exit;
    }

    try {

        $check = $pdo->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
        $check->execute([
            ":username" => $username,
            ":email" => $email
        ]);

        if ($check->fetch()) {
            echo "Username or email already exists";
            header("Location: ../Dashboard/dashboard.php");
            exit;
        }

        $password_hash = password_hash($password1, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO users (username, email, password_hash)
            VALUES (:username, :email, :password_hash)
        ");

        $stmt->execute([
            ":username" => $username,
            ":email" => $email,
            ":password_hash" => $password_hash
        ]);

        echo "success";
        header("Location: ../Dashboard/dashboard.php");
    } catch (PDOException $e) {
        echo "Database error";
    }
}
