<?php

require_once '../Dashboard/auth_check.php';
require_once '../Dashboard/DB.php';
require_once '../Admin_Panel/admin_check.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
$username = $user ? $user['username'] : 'Unknown User';

?>
<!DOCTYPE html>

<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="panel.css">
    <link rel="icon" type="image/x-icon" href="../baobao.jpg">
    <meta lang="en">

</head>
<body>
    <h1>admin panel</h1>
    <h2>epic admin panel</h2>
    <p>Welcome, <?php echo htmlspecialchars($username); ?> You have admin access.</p>
    
</body>
