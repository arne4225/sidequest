<?php

session_start();
require 'DB.php';

$isLoggedIn = isset($_SESSION['user_id']);
$user = null;

if ($isLoggedIn) {
    $stmtUser = $pdo->prepare("SELECT username FROM users WHERE id = ?");
    $stmtUser->execute([$_SESSION['user_id']]);
    $user = $stmtUser->fetch();
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>SideQuest Dashboard</title>
    <script defer src="dashboard.js"></script>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" type="image/x-icon" href="../baobao.jpg">
    <meta lang="en">
</head>

<body data-loggedin="<?php echo $isLoggedIn ? 'true' : 'false'; ?>">

    <!--login overlay-->
    <div id="login">
        <div id="login-content">
            <h3>Login Page</h3>
            <form method="POST" action="login.php">
                <label for="loginname">Username:</label>
                <input type="text" id="loginname" name="username">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">

                <button id="loginbtn" type="submit">Login</button>
            </form>
            <button id="gotosignup"> Sign up Instead</button>
        </div>
    </div>
    <!--signup overlay-->
    <div id="signup">
        <div id="signup-content">
            <h3>Signup Page</h3>
            <form method="POST" action="signup.php">
                <label for="user">Username:</label>
                <input type="text" id="user" name="username">

                <label for="signupemail">E-mail:</label>
                <input type="email" id="signupemail" name="email">

                <label for="password1">Password:</label>
                <input type="password" id="password1" name="password1">

                <label for="password2">Confirm Password:</label>
                <input type="password" id="password2" name="password2">

                <button id="signupbtn" type="submit">Sign up</button>
            </form>
        </div>
    </div>

    <nav>
        <h3>The Sidequest App</h3>
    </nav>
    <div id="flexxer">
        <div id="sidebar">
            <div id="sidebarbtns">
                <button class="sidebaritem"><a href="../Dashboard/dashboard.php">Challenge</a></button>
                <button class="sidebaritem"><a href="../Shop/shop.html">Rewards Shop</a></button>
                <button class="sidebaritem"><a href="../Leaderboard/leaderboard.html">Leaderboard</a></button>
                <button class="sidebaritem" id="logoutbtn"><a href="logout.php">Logout</a></button>
                <button class="sidebaritem"><a href="../Admin Panel/panel.html">Admin Panel</a></button>
            </div>
            <p id="usernamedisplay">
                <?php echo $user ? htmlspecialchars($user['username']) : 'Not logged in'; ?>
            </p>
        </div>
        <div class="contentbody">
            <h1 class="chaltitle">Insert Challenge title.</h1>
            <p class="chaldesc">Insert Challenge Description.</p>
        </div>
    </div>
</body>

</html>