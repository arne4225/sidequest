<?php
session_start();
require_once "DB.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if (empty($username) || empty($password)) {
        echo "Fill in all fields";
        
header("Location: ../Dashboard/dashboard.php");
        exit;
    }

    try {

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([
            ":username" => $username
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password_hash"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["admin"] = $user["admin"];

            echo "success";
            header("Location: ../Dashboard/dashboard.php");
        } else {
            echo "Invalid username or password";
            
header("Location: ../Dashboard/dashboard.php");
        }
    } catch (PDOException $e) {
        echo "Database error";
    }
}
