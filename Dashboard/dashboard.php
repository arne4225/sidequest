<?php

session_start();
require 'DB.php';


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

<body>
    <!--login overlay-->
    <div id="login">
        <div id="login-content">
            <h3>Login Page</h3>
            <form method="POST" action="login.php">
                <label for="loginname">Username:</label>
                <input type="text" id="loginname" name="username">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">

                <button id="loginbtn" type="button">Login</button>
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

               <button id="signupbtn" type="button">Sign up</button>
            </form>
        </div>
    </div>

    <nav>
        <h3>The Sidequest App</h3>
    </nav>

    <div id="sidebar">
        <div id="sidebarbtns"></div>
        <button class="sidebaritem"><a href="../Dashboard/dashboard.php">Challenge</a></button>
        <button class="sidebaritem"><a href="../Shop/shop.html">Rewards Shop</a></button>
        <button class="sidebaritem"><a href="../Leaderboard/leaderboard.html">Leaderboard</a></button>
        <button class="sidebaritem" id="logoutbtn"><a href="logout.php">Logout</a></button>
        <button class="sidebaritem"><a href="../Admin Panel/panel.html">Admin Panel</a></button>
        <p id="usernamedisplay"></p>
    </div>
</body>

</html>