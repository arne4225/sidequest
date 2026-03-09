<?php

session_start();

$_SESSION = [];

session_destroy();

header("Location: ../Dashboard/dashboard.html");
exit;