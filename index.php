<?php

session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard/index.php");
    exit;
}

header("Location: auth/login.php");
exit;